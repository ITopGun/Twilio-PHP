<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\Insights\V1\Call;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class CallSummaryTest extends HolodeckTestCase {
    public function testFetchRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->insights->v1->calls("CAXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                       ->summary()->fetch();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://insights.twilio.com/v1/Voice/CAXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/Summary'
        ));
    }

    public function testFetchResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "call_sid": "CAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "call_type": "carrier",
                "call_state": "ringing",
                "answered_by": "machine_start",
                "processing_state": "complete",
                "created_time": "2015-07-30T20:00:00Z",
                "start_time": "2015-07-30T20:00:00Z",
                "end_time": "2015-07-30T20:00:00Z",
                "duration": 100,
                "connect_duration": 99,
                "from": {},
                "to": {},
                "carrier_edge": {},
                "client_edge": {},
                "sdk_edge": {},
                "sip_edge": {},
                "tags": [
                    "tags"
                ],
                "attributes": {},
                "properties": {},
                "trust": {},
                "annotation": {
                    "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                    "call_sid": "CAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                    "answered_by": "human",
                    "connectivity_issue": "invalid_number",
                    "quality_issues": [
                        "low_volume"
                    ],
                    "spam": true,
                    "call_score": 2,
                    "comment": "this is a call",
                    "incident": "https://twilio.zendesk.com/support/tickets/17353089"
                },
                "url": "https://insights.twilio.com/v1/Voice/CAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Summary"
            }
            '
        ));

        $actual = $this->twilio->insights->v1->calls("CAXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                             ->summary()->fetch();

        $this->assertNotNull($actual);
    }
}