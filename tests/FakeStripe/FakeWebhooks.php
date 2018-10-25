<?php

namespace Tests\FakeStripe;

class FakeWebhooks
{
	protected $productChargeSucceeded = '{
		"created": 1326853478,
		"livemode": false,
		"id": "evt_00000000000000",
		"type": "charge.succeeded",
		"object": "event",
		"request": null,
		"pending_webhooks": 1,
		"api_version": "2018-02-06",
		"data": {
			"object": {
			  "id": "ch_00000000000000",
			  "object": "charge",
			  "amount": 10000,
			  "amount_refunded": 0,
			  "application": null,
			  "application_fee": null,
			  "balance_transaction": "txn_00000000000000",
			  "captured": true,
			  "created": 1527263849,
			  "currency": "usd",
			  "customer": "cus_00000000000000",
			  "description": "Purchase of Omnis vel hic fugit non et.",
			  "destination": null,
			  "dispute": null,
			  "failure_code": null,
			  "failure_message": null,
			  "fraud_details": {
			  },
			  "invoice": null,
			  "livemode": false,
			  "metadata": {
			  },
			  "on_behalf_of": null,
			  "order": null,
			  "outcome": {
			    "network_status": "approved_by_network",
			    "reason": null,
			    "risk_level": "normal",
			    "seller_message": "Payment complete.",
			    "type": "authorized"
			  },
			  "paid": true,
			  "receipt_email": "jdoe@email.com",
			  "receipt_number": null,
			  "refunded": false,
			  "refunds": {
			    "object": "list",
			    "data": [

				    ],
				    "has_more": false,
				    "total_count": 0,
				    "url": "/v1/charges/ch_1CViIHGr8sMLPSmbW1ixMRsI/refunds"
				  },
				  "review": null,
				  "shipping": null,
				  "source": {
				    "id": "card_00000000000000",
				    "object": "card",
				    "address_city": null,
				    "address_country": null,
				    "address_line1": null,
				    "address_line1_check": null,
				    "address_line2": null,
				    "address_state": null,
				    "address_zip": null,
				    "address_zip_check": null,
				    "brand": "Visa",
				    "country": "US",
				    "customer": "cus_00000000000000",
				    "cvc_check": null,
				    "dynamic_last4": null,
				    "exp_month": 5,
				    "exp_year": 2019,
				    "fingerprint": "l2YJm6QJhQETWKY9",
				    "funding": "credit",
				    "last4": "4242",
				    "metadata": {
				    },
				    "name": null,
				    "tokenization_method": null
				  },
				  "source_transfer": null,
				  "statement_descriptor": null,
				  "status": "succeeded",
				  "transfer_group": null
				}
			}
		}';

	protected $chargeSucceeded = '{
		"created": 1326853478,
		"livemode": false,
		"id": "evt_00000000000000",
		"type": "charge.succeeded",
		"object": "event",
		"request": null,
		"pending_webhooks": 1,
		"api_version": "2018-02-06",
		"data": {
			"object": {
				"id": "ch_00000000000000",
				"object": "charge",
				"amount": 1500,
				"amount_refunded": 0,
				"application": null,
				"application_fee": null,
				"balance_transaction": "txn_00000000000000",
				"captured": true,
				"created": 1522256330,
				"currency": "usd",
				"customer": "cus_00000000000000",
				"description": null,
				"destination": null,
				"dispute": null,
				"failure_code": null,
				"failure_message": null,
				"fraud_details": {
				},
				"invoice": "in_00000000000000",
				"livemode": false,
				"metadata": {
				},
				"on_behalf_of": null,
				"order": null,
				"outcome": {
					"network_status": "approved_by_network",
					"reason": null,
					"risk_level": "normal",
					"seller_message": "Payment complete.",
					"type": "authorized"
				},
				"paid": true,
				"receipt_email": "doe@email.com",
				"receipt_number": null,
				"refunded": false,
				"refunds": {
					"object": "list",
					"data": [

					],
					"has_more": false,
					"total_count": 0,
					"url": "/v1/charges/ch_1CAhbqGr8sMLPSmbZhcYPMT4/refunds"
				},
				"review": null,
				"shipping": null,
				"source": {
					"id": "card_00000000000000",
					"object": "card",
					"address_city": null,
					"address_country": null,
					"address_line1": null,
					"address_line1_check": null,
					"address_line2": null,
					"address_state": null,
					"address_zip": null,
					"address_zip_check": null,
					"brand": "Visa",
					"country": "US",
					"customer": "cus_00000000000000",
					"cvc_check": "pass",
					"dynamic_last4": null,
					"exp_month": 1,
					"exp_year": 2025,
					"fingerprint": "l2YJm6QJhQETWKY9",
					"funding": "credit",
					"last4": "4242",
					"metadata": {
					},
					"name": null,
					"tokenization_method": null
				},
				"source_transfer": null,
				"statement_descriptor": "AnandamayiYoga",
				"status": "succeeded",
				"transfer_group": null
			}
		}
	}';

	protected $chargeFailed = '{
		"created": 1326853478,
		"livemode": false,
		"id": "evt_00000000000000",
		"type": "charge.failed",
		"object": "event",
		"request": null,
		"pending_webhooks": 1,
		"api_version": "2018-02-06",
		"data": {
			"object": {
				"id": "ch_00000000000000",
				"object": "charge",
				"amount": 1500,
				"amount_refunded": 0,
				"application": null,
				"application_fee": null,
				"balance_transaction": "txn_00000000000000",
				"captured": true,
				"created": 1522256330,
				"currency": "usd",
				"customer": "cus_00000000000000",
				"description": null,
				"destination": null,
				"dispute": null,
				"failure_code": null,
				"failure_message": null,
				"fraud_details": {
				},
				"invoice": "in_00000000000000",
				"livemode": false,
				"metadata": {
				},
				"on_behalf_of": null,
				"order": null,
				"outcome": {
					"network_status": "approved_by_network",
					"reason": null,
					"risk_level": "normal",
					"seller_message": "Payment complete.",
					"type": "authorized"
				},
				"paid": false,
				"receipt_email": "doe@email.com",
				"receipt_number": null,
				"refunded": false,
				"refunds": {
					"object": "list",
					"data": [

					],
					"has_more": false,
					"total_count": 0,
					"url": "/v1/charges/ch_1CAhbqGr8sMLPSmbZhcYPMT4/refunds"
				},
				"review": null,
				"shipping": null,
				"source": {
					"id": "card_00000000000000",
					"object": "card",
					"address_city": null,
					"address_country": null,
					"address_line1": null,
					"address_line1_check": null,
					"address_line2": null,
					"address_state": null,
					"address_zip": null,
					"address_zip_check": null,
					"brand": "Visa",
					"country": "US",
					"customer": "cus_00000000000000",
					"cvc_check": "pass",
					"dynamic_last4": null,
					"exp_month": 1,
					"exp_year": 2025,
					"fingerprint": "l2YJm6QJhQETWKY9",
					"funding": "credit",
					"last4": "4242",
					"metadata": {
					},
					"name": null,
					"tokenization_method": null
				},
				"source_transfer": null,
				"statement_descriptor": "AnandamayiYoga",
				"status": "succeeded",
				"transfer_group": null
			}
		}
	}';

	protected $chargeRefunded = '{
		"created": 1326853478,
		"livemode": false,
		"id": "evt_00000000000000",
		"type": "charge.refunded",
		"object": "event",
		"request": null,
		"pending_webhooks": 1,
		"api_version": "2018-02-06",
		"data": {
			"object": {
				"id": "ch_00000000000000",
				"object": "charge",
				"amount": 1500,
				"amount_refunded": 1500,
				"application": null,
				"application_fee": null,
				"balance_transaction": "txn_00000000000000",
				"captured": true,
				"created": 1522256330,
				"currency": "usd",
				"customer": "cus_00000000000000",
				"description": null,
				"destination": null,
				"dispute": null,
				"failure_code": null,
				"failure_message": null,
				"fraud_details": {
				},
				"invoice": "in_00000000000000",
				"livemode": false,
				"metadata": {
				},
				"on_behalf_of": null,
				"order": null,
				"outcome": {
					"network_status": "approved_by_network",
					"reason": null,
					"risk_level": "normal",
					"seller_message": "Payment complete.",
					"type": "authorized"
				},
				"paid": true,
				"receipt_email": "doe@email.com",
				"receipt_number": null,
				"refunded": true,
				"refunds": {
					"object": "list",
					"data": [
						{
							"id": "re_Ca1pzoLh5afWEx",
							"object": "refund",
							"amount": 1500,
							"balance_transaction": "txn_Ca1pkvkXmkmMHm",
							"charge": "ch_1CAhbqGr8sMLPSmbZhcYPMT4",
							"created": 1522295377,
							"currency": "usd",
							"metadata": {
							},
							"reason": null,
							"receipt_number": "1477-0235",
							"status": "succeeded"
						}
					],
					"has_more": false,
					"total_count": 0,
					"url": "/v1/charges/ch_1CAhbqGr8sMLPSmbZhcYPMT4/refunds"
				},
				"review": null,
				"shipping": null,
				"source": {
					"id": "card_00000000000000",
					"object": "card",
					"address_city": null,
					"address_country": null,
					"address_line1": null,
					"address_line1_check": null,
					"address_line2": null,
					"address_state": null,
					"address_zip": null,
					"address_zip_check": null,
					"brand": "Visa",
					"country": "US",
					"customer": "cus_00000000000000",
					"cvc_check": "pass",
					"dynamic_last4": null,
					"exp_month": 1,
					"exp_year": 2025,
					"fingerprint": "l2YJm6QJhQETWKY9",
					"funding": "credit",
					"last4": "4242",
					"metadata": {
					},
					"name": null,
					"tokenization_method": null
				},
				"source_transfer": null,
				"statement_descriptor": "AnandamayiYoga",
				"status": "succeeded",
				"transfer_group": null,
				"fee": 0
			}
		}
	}';

	public function __get($property) {
		if (property_exists($this, $property)) {
			return json_decode($this->$property, $toArray = true);
		}
	}
}
