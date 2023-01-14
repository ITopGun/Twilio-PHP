<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\Messaging\V1;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class DomainCertsTest extends HolodeckTestCase {
    public function testUpdateRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->messaging->v1->domainCerts("DNXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->update("tls_cert");
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $values = ['TlsCert' => "tls_cert", ];

        $this->assertRequest(new Request(
            'post',
            'https://messaging.twilio.com/v1/LinkShortening/Domains/DNXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/Certificate',
            null,
            $values
        ));
    }

    public function testUpdateResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "certificate_sid": "CWaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "domain_name": "https://api.example.com",
                "domain_sid": "DNaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "date_expires": "2021-02-06T18:02:04Z",
                "date_created": "2021-02-06T18:02:04Z",
                "date_updated": "2021-02-06T18:02:04Z",
                "url": "https://messaging.twilio.com/v1/LinkShortening/Domains/DNaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Certificate",
                "validated": true
            }
            '
        ));

        $actual = $this->twilio->messaging->v1->domainCerts("DNXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->update("tls_cert");

        $this->assertNotNull($actual);
    }

    public function testCreateResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "certificate_sid": "CWaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "domain_name": "https://api.example.com",
                "domain_sid": "DNaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "date_expires": "2021-02-06T18:02:04Z",
                "date_created": "2021-02-06T18:02:04Z",
                "date_updated": "2021-02-06T18:02:04Z",
                "url": "https://messaging.twilio.com/v1/LinkShortening/Domains/DNaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Certificate",
                "validated": true
            }
            '
        ));

        $actual = $this->twilio->messaging->v1->domainCerts("DNXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->update("tls_cert");

        $this->assertNotNull($actual);
    }

    public function testFetchRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->messaging->v1->domainCerts("DNXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->fetch();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://messaging.twilio.com/v1/LinkShortening/Domains/DNXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/Certificate'
        ));
    }

    public function testFetchResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "certificate_sid": "CWaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "domain_name": "https://api.example.com",
                "domain_sid": "DNaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "date_expires": "2021-02-06T18:02:04Z",
                "date_created": "2021-02-06T18:02:04Z",
                "date_updated": "2021-02-06T18:02:04Z",
                "url": "https://messaging.twilio.com/v1/LinkShortening/Domains/DNaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Certificate",
                "validated": true
            }
            '
        ));

        $actual = $this->twilio->messaging->v1->domainCerts("DNXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->fetch();

        $this->assertNotNull($actual);
    }

    public function testDeleteRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->messaging->v1->domainCerts("DNXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->delete();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'delete',
            'https://messaging.twilio.com/v1/LinkShortening/Domains/DNXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/Certificate'
        ));
    }

    public function testDeleteResponse(): void {
        $this->holodeck->mock(new Response(
            204,
            null
        ));

        $actual = $this->twilio->messaging->v1->domainCerts("DNXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->delete();

        $this->assertTrue($actual);
    }
}