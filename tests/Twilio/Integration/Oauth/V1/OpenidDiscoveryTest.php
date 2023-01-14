<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\Oauth\V1;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class OpenidDiscoveryTest extends HolodeckTestCase {
    public function testFetchRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->oauth->v1->openidDiscovery()->fetch();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://oauth.twilio.com/v1/.well-known/openid-configuration'
        ));
    }

    public function testFetchResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "issuer": "https://iam.twilio.com",
                "authorization_endpoint": "https://oauth.twilio.com/oauth2/authorize",
                "device_authorization_endpoint": "https://oauth.twilio.com/oauth2/device/authorize",
                "token_endpoint": "https://oauth.twilio.com/oauth2/token",
                "userinfo_endpoint": "https://oauth.twilio.com/oauth2/userinfo",
                "revocation_endpoint": "https://oauth.twilio.com/oauth2/revoke",
                "jwk_uri": "https://oauth.twilio.com/oauth2/certs",
                "response_type_supported": [
                    "code",
                    "token"
                ],
                "subject_type_supported": [
                    "account_sid",
                    "user_sid"
                ],
                "id_token_signing_alg_values_supported": [
                    "ECDSA",
                    "RSA256"
                ],
                "scopes_supported": [
                    "openid",
                    "profile",
                    "email"
                ],
                "claims_supported": [
                    "act",
                    "aud",
                    "cid",
                    "device_id",
                    "exp",
                    "jti",
                    "iat",
                    "iss",
                    "nbf",
                    "scp",
                    "sub"
                ],
                "url": "https://oauth.twilio.com/v1/.well-known/openid-configuration"
            }
            '
        ));

        $actual = $this->twilio->oauth->v1->openidDiscovery()->fetch();

        $this->assertNotNull($actual);
    }
}