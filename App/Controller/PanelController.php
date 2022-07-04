<?php

namespace Electro\App\Controller;

use Electro\App\Model\Link;
use Electro\Classes\Config;
use Electro\Classes\Exception\ValidatorNotFoundException;
use Electro\Classes\Redirect;
use Electro\Classes\ViewEngine;
use Shetabit\Multipay\Invoice;
use Shetabit\Multipay\Payment;

class PanelController
{

    /**
     * @return ViewEngine|Redirect
     */
    public function index(): ViewEngine|Redirect
    {
        return view("panel>panel");
    }

    /**
     * @throws ValidatorNotFoundException
     */
    public function postSimpleLink(): ViewEngine
    {
        request()->validatePostsAndFiles("createLink");

        $slug = getRandomString(5);

        if (!startsWith(request()->getValidated()["link"], "https://") && !startsWith(request()->getValidated()["link"], "http://")) {
            $link = "https://" . request()->getValidated()["link"];
        } else {
            $link = request()->getValidated()["link"];
        }

        while (Link::query()->where("slug", $slug)->first()) {
            $slug = getRandomString(5);
        }

        Link::query()->create([
            "user_id" => auth()->userModel->id,
            "slug" => $slug,
            "target" => $link
        ]);

        return view("panel>showLink", compact("slug"));
    }

    public function postAdvanceLink()
    {
        request()->validatePostsAndFiles("createAdvanceLinkValidator");

        if (!auth()->userModel->user_type) {
            return \redirect(back())->with("e", "برای ایجاد لینک با اسلاگ دلخواه باید حساب طلایی داشته باشید");
        }

        if (!startsWith(request()->getValidated()["link"], "https://") && !startsWith(request()->getValidated()["link"], "http://")) {
            $link = "https://" . request()->getValidated()["link"];
        } else {
            $link = request()->getValidated()["link"];
        }
        Link::query()->create([
            "user_id" => auth()->userModel->id,
            "slug" => request()->getValidated()["slug"],
            "target" => $link
        ]);

        $slug = request()->getValidated()["slug"];

        return view("panel>showLink", compact("slug"));


    }

    /**
     * @throws \Exception
     */
    public function upgrade()
    {
        if (auth()->userModel->user_type) {
            return \redirect(back())->withMessage("a", "شما حساب کاربری طلایی دارید.");
        }
        $config = Config::getInstance()->getAllConfig("payment");
        $payment = new Payment($config);

        $invoice = new Invoice();
        $invoice->amount(10000);
        return $payment->purchase($invoice, function ($driver, $transactionId) {
            auth()->userModel->transaction_id = $transactionId;
            auth()->userModel->save();
        })->pay();
    }

    public function verifyPayment()
    {
        $config = Config::getInstance()->getAllConfig("payment");
        $payment = new Payment($config);
        if (auth()->userModel->transaction_id) {
            try {
                $refID = $payment->amount(10000)->transactionId(auth()->userModel->transaction_id)->verify();
                $refID = $refID->getReferenceId();
                auth()->userModel->update([
                    "user_type" => true
                ]);
                return \redirect(route("panel") . "?refId:$refID}")->withMessage("back", "ارتقا انجام شد.");
            } catch (\Exception $exception) {
                return \redirect(route("panel"))->with("app", $exception->getMessage());
            }
        } else {
            return \redirect(route("panel"))->withMessage("e", "شناسه تراکنش یافت نشد.");
        }
    }

}