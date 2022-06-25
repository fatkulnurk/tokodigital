<?php

return [
    'platform-fee' => 500,
    'expired_at' => 12, // in hours
    'api' => [
        'token' => env('BILLER_TOKEN', ''),
        'merchant_id' => env('BILLER_MERCHANT_ID', '')
    ],
    'payments' => [
        'duitku' => [
            'merchant_key' => env('DUITKU_MERCHANT_KEY', ''),
            'merchant_code' => env('DUITKU_MERCHANT_CODE', ''),
            'is_sandbox' => env('DUITKU_SANDBOX', true)
        ],
        'indodax' => [
            'api_key' => env('INDODAX_API_KEY', ''),
            'secret_key' => env('INDODAX_SECRET_KEY', '')
        ],
        'moota' => [
            'personal_access_token' => env('MOOTA_PERSONAL_ACCESS_TOKEN', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiJucWllNHN3OGxsdyIsImp0aSI6IjZlOTFhZmFkNTY5NzJjMjgxNGRjYzFjZGNjOTdmZDlkMDM4OGE3Njc2Y2ZmYjYyMGVlMjE0NmUwMDA1NjU5Mzk5OWM2YTlkM2ZlMjhkY2QxIiwiaWF0IjoxNjU2MTIwNzMyLjc0ODcyNSwibmJmIjoxNjU2MTIwNzMyLjc0ODcyNywiZXhwIjoxNjg3NjU2NzMyLjc0NzAxNiwic3ViIjoiMTU2NDkiLCJzY29wZXMiOlsibXV0YXRpb25fcmVhZCIsIm11dGF0aW9uIl19.fGDNRXMatsiB69PCnLsnaj_fJSIqrpJvO4Z8DYzLRR9_CbEdFr7edZU1Mo2bEaabeNK8GPliQFQb1EFVXD4ACjC7vXvDgPoOEIV-VwnCvxeMxuUZW8uh1UgYvBk50ZsUgL1HcGTD7KVMDVpizOWo73YpSCz1Uvr6hAOPO2H5q7tlmh7zj2ERE_eu4et-BJ3U9wdefcEwICN03gMOnu0c56jvDsb25biZf81nx5qGC4Gor3gfE72bOh_jZC7DoCCeJBmM_sVax7QuiXh6oTZUYQ7p88uvqUWuxVBxMEMoT8o6SIInyt241L3ZsCLyzUlvkcL7qRi5WQPSSAkaT2hT8MsWDziUhUjmA5nSXYDZ6NGmY1KxiFt85e0h8shl1H17Gwtg8j7CLPgFtw8kBPx2S2aTfZ0YWgggOBBU2MrcTWeTMJcxbffMcl6_M99a3L3_fcz0RaeTtmFwZXkV5DNYHXpAKsnuMFsqX_iQrwxvOBOq1fkxMYDjsYEWrGjyVNM9QtRdk4hcmSErYfiK0j8X5dXEbu7KCzwN8FXtGSdNS0islv9NEVdwpPX0mNeUp8P4dTUJQAwm41JtOGkPJ6o7e_bEArk817x1l75lJ0MEnx2VNmDRCKqjxLNHb7uvXWwq-94Tyghw4tlNecNiky9KjT3RLs5gSsmOmOIDzmMkxwA'),
        ]
    ]
];