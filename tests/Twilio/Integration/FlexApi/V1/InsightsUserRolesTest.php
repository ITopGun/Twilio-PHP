<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\FlexApi\V1;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class InsightsUserRolesTest extends HolodeckTestCase {
    public function testFetchRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        $options = ['authorization' => "authorization", ];

        try {
            $this->twilio->flexApi->v1->insightsUserRoles()->fetch($options);
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $headers = ['Authorization' => "authorization", ];

        $this->assertRequest(new Request(
            'get',
            'https://flex-api.twilio.com/v1/Insights/UserRoles',
            [],
            [],
            $headers
        ));
    }

    public function testFetchResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "roles": [
                    "wfo.full_access"
                ],
                "url": "https://flex-api.twilio.com/v1/Insights/UserRoles"
            }
            '
        ));

        $actual = $this->twilio->flexApi->v1->insightsUserRoles()->fetch();

        $this->assertNotNull($actual);
    }
}