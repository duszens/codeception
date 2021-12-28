<?php
use \AcceptanceTester;
use GuzzleHttp\Client;


class FirstCest
{
    public function _before()
    {

    }

    public function _after()
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->amOnPage('admin');
        $I->fillField('login', 'admin');
        $I->fillField('password', 'krzysiek12');
        #$I->click(['css' => 'button.btn btn_bg']);
        $I->click('Zaloguj się');
        $I->amOnPage('/admin/configEmails/edit/name/mail_client_question');
        $I->fillField('content', 'weryfikacja znacznika email  {shop_email}  drugi znacznik {email}');
        $I->click('save');
        $I->amOnPage('admin/customers/edit/id/4');
        $I->click('li.sidemenu__link:nth-child(7)');
        $I->click('Wyślij');

        # $I->wait(15);
        #$I->canSee('Konto zostało założone. Aby zalogować się do sklepu, sprawdź pocztę i kliknij na link potwierdzający poprawność adresu e-mail.' , '.alert-success');



    }
}
