<?php

namespace Tests\FakeStripe;

class FakeStripe
{
	protected $createCharge = '{
	  "id": "ch_1CZl2QGr8sMLPSmbyAJB6uda",
	  "object": "charge",
	  "amount": 1500,
	  "amount_refunded": 0,
	  "application": null,
	  "application_fee": null,
	  "balance_transaction": "txn_1CYIBcGr8sMLPSmbASmpSmG9",
	  "captured": true,
	  "created": 1528227710,
	  "currency": "usd",
	  "customer": "cus_CzkXS1jOeKtD5q",
	  "description": null,
	  "destination": null,
	  "dispute": null,
	  "failure_code": null,
	  "failure_message": null,
	  "fraud_details": {
	  },
	  "invoice": "in_1CZl2QGr8sMLPSmbl181XQ7J",
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
	    "url": "/v1/charges/ch_1CZl2QGr8sMLPSmbyAJB6uda/refunds"
	  },
	  "review": null,
	  "shipping": null,
	  "source": {
	    "id": "card_1CZl2OGr8sMLPSmbfgHL3yvO",
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
	    "customer": "cus_CzkXS1jOeKtD5q",
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
	}';

	protected $createCustomer = '{
		"id": "cus_CZpDjb0kmVkVwK",
		"object": "customer",
		"account_balance": 0,
		"created": 1522248491,
		"currency": "usd",
		"default_source": "card_1CAgfdGr8sMLPSmbsPWNNkqh",
		"delinquent": false,
		"description": null,
		"discount": null,
		"email": "arthurvillar@gmail.com",
		"invoice_prefix": "F324F7F",
		"livemode": false,
		"metadata": {
		},
		"shipping": null,
		"sources": {
			"object": "list",
			"data": [
				{
					"id": "card_1CAgfdGr8sMLPSmbsPWNNkqh",
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
					"customer": "cus_CZpDjb0kmVkVwK",
					"cvc_check": "pass",
					"dynamic_last4": null,
					"exp_month": 2,
					"exp_year": 2020,
					"fingerprint": "l2YJm6QJhQETWKY9",
					"funding": "credit",
					"last4": "4242",
					"metadata": {
					},
					"name": null,
					"tokenization_method": null
				}
			],
			"has_more": false,
			"total_count": 1,
			"url": "/v1/customers/cus_CZpDjb0kmVkVwK/sources"
		},
		"subscriptions": {
			"object": "list",
			"data": [
				{
					"id": "sub_CZpDl257wLzX8m",
					"object": "subscription",
					"application_fee_percent": null,
					"billing": "charge_automatically",
					"billing_cycle_anchor": 1522248491,
					"cancel_at_period_end": false,
					"canceled_at": null,
					"created": 1522248491,
					"current_period_end": 1524926891,
					"current_period_start": 1522248491,
					"customer": "cus_CZpDjb0kmVkVwK",
					"days_until_due": null,
					"discount": null,
					"ended_at": null,
					"items": {
						"object": "list",
						"data": [
							{
								"id": "si_CZpDie6TVp0KfX",
								"object": "subscription_item",
								"created": 1522248491,
								"metadata": {
								},
								"plan": {
									"id": "monthly",
									"object": "plan",
									"amount": 1500,
									"created": 1522248412,
									"currency": "usd",
									"interval": "month",
									"interval_count": 1,
									"livemode": false,
									"metadata": {
									},
									"nickname": "Membership",
									"product": "prod_CZpCCIG96sIVwx",
									"trial_period_days": null
								},
								"quantity": 1,
								"subscription": "sub_CZpDl257wLzX8m"
							}
						],
						"has_more": false,
						"total_count": 1,
						"url": "/v1/subscription_items?subscription=sub_CZpDl257wLzX8m"
					},
					"livemode": false,
					"metadata": {
					},
					"plan": {
						"id": "monthly",
						"object": "plan",
						"amount": 1500,
						"created": 1522248412,
						"currency": "usd",
						"interval": "month",
						"interval_count": 1,
						"livemode": false,
						"metadata": {
						},
						"nickname": "Membership",
						"product": "prod_CZpCCIG96sIVwx",
						"trial_period_days": null
					},
					"quantity": 1,
					"start": 1522248491,
					"status": "active",
					"tax_percent": null,
					"trial_end": null,
					"trial_start": null
				}
			],
			"has_more": false,
			"total_count": 1,
			"url": "/v1/customers/cus_CZpDjb0kmVkVwK/subscriptions"
		}
	}';

	protected $cancelMembership = '{
		"id": "sub_CZrKuqhwNKYwYO",
		"object": "subscription",
		"application_fee_percent": null,
		"billing": "charge_automatically",
		"billing_cycle_anchor": 1522256330,
		"cancel_at_period_end": true,
		"canceled_at": 1522256332,
		"created": 1522256330,
		"current_period_end": 1824934730,
		"current_period_start": 1522256330,
		"customer": "cus_CZpDjb0kmVkVwK",
		"days_until_due": null,
		"discount": null,
		"ended_at": 1522256335,
		"items": {
			"object": "list",
			"data": [
				{
					"id": "si_CZrK5MxDwCOzAB",
					"object": "subscription_item",
					"created": 1522256330,
					"metadata": {
					},
					"plan": {
						"id": "monthly",
						"object": "plan",
						"amount": 1500,
						"created": 1522248412,
						"currency": "usd",
						"interval": "month",
						"interval_count": 1,
						"livemode": false,
						"metadata": {
						},
						"nickname": "Membership",
						"product": "prod_CZpCCIG96sIVwx",
						"trial_period_days": null
					},
					"quantity": 1,
					"subscription": "sub_CZrKuqhwNKYwYO"
				}
			],
			"has_more": false,
			"total_count": 1,
			"url": "/v1/subscription_items?subscription=sub_CZrKuqhwNKYwYO"
		},
		"livemode": false,
		"metadata": {
		},
		"plan": {
			"id": "monthly",
			"object": "plan",
			"amount": 1500,
			"created": 1522248412,
			"currency": "usd",
			"interval": "month",
			"interval_count": 1,
			"livemode": false,
			"metadata": {
			},
			"nickname": "Membership",
			"product": "prod_CZpCCIG96sIVwx",
			"trial_period_days": null
		},
		"quantity": 1,
		"start": 1522256330,
		"status": "canceled",
		"tax_percent": null,
		"trial_end": null,
		"trial_start": null
	}';

	protected $cancelMembershipImmediately = '{
		"id": "sub_CZrKuqhwNKYwYO",
		"object": "subscription",
		"application_fee_percent": null,
		"billing": "charge_automatically",
		"billing_cycle_anchor": 1522256330,
		"cancel_at_period_end": false,
		"canceled_at": 1522256332,
		"created": 1522256330,
		"current_period_end": 1524934730,
		"current_period_start": 1522256330,
		"customer": "cus_CZpDjb0kmVkVwK",
		"days_until_due": null,
		"discount": null,
		"ended_at": 1522256335,
		"items": {
			"object": "list",
			"data": [
				{
					"id": "si_CZrK5MxDwCOzAB",
					"object": "subscription_item",
					"created": 1522256330,
					"metadata": {
					},
					"plan": {
						"id": "monthly",
						"object": "plan",
						"amount": 1500,
						"created": 1522248412,
						"currency": "usd",
						"interval": "month",
						"interval_count": 1,
						"livemode": false,
						"metadata": {
						},
						"nickname": "Membership",
						"product": "prod_CZpCCIG96sIVwx",
						"trial_period_days": null
					},
					"quantity": 1,
					"subscription": "sub_CZrKuqhwNKYwYO"
				}
			],
			"has_more": false,
			"total_count": 1,
			"url": "/v1/subscription_items?subscription=sub_CZrKuqhwNKYwYO"
		},
		"livemode": false,
		"metadata": {
		},
		"plan": {
			"id": "monthly",
			"object": "plan",
			"amount": 1500,
			"created": 1522248412,
			"currency": "usd",
			"interval": "month",
			"interval_count": 1,
			"livemode": false,
			"metadata": {
			},
			"nickname": "Membership",
			"product": "prod_CZpCCIG96sIVwx",
			"trial_period_days": null
		},
		"quantity": 1,
		"start": 1522256330,
		"status": "canceled",
		"tax_percent": null,
		"trial_end": null,
		"trial_start": null
	}';

	public function __get($property) {
		if (property_exists($this, $property)) {
			return json_decode($this->$property);
		}
	}
}
