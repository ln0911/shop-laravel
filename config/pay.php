<?php
/**
 * Created by PhpStorm.
 * User: lining
 * Date: 2018/11/28
 * Time: 10:45 AM
 */
return [
    'alipay' => [
        'app_id'         => '2016091900549444',
        'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAwvHLUzyisoZtfKUR00CUUC9RPzoMbGMn78/rcfSwSyaLGlSzVAWgrU62NIkfPmY80Yti7lj1Zg+95VyqHKQ0vFC9FYLxp8Yz7c/Frlxl9fl+CLlFQeO4Wt4fYH3CdgFaS8rvcRp8eEuTSi2Qoo6d2nj+VqC6Fh88W/c4OYkmmqKauLaaslJzRnACGnc5yx0/x7kEE6/O1vCJFnjvaCGyK+6F0Sg/AS+W7l6PnnccxjW5k39NaqVF1H0BARDfqJdn0Ks4/8u3745j86o4oUe7Kx5/KIfHxf6KukcJrISiDjYZvA4WUDMgjmEHqfZfCsOZ9VQiK87aN5mc+DlmbOIMJQIDAQAB',
        'private_key'    => 'MIIEogIBAAKCAQEArcRUaL+W68q8vvopOieGiQF1twcdT7Z9OuM/KCKBHyUAEo/aq8cGAoV6hbBNytEnwuaFyJwnGssr6/93ltKgoWRjCxuCe7KMs2C4ow76LwfYc0MgkmPYXWuVwnV+1QsGLuiGNgAbKsBEW945iiBbg8FZYuREi/Ta7ulwb5ik3EIn1Dj2e0SV8/rss+EDrJ/ciueDHQnwhOW9j7twcPTxY1dcSoqIMdDRkiLugPPyzQJ7idMAPQcY3Ytr9dylxGGQSlXnJ5S8fSyZ3CVFPOJos3bIjo6xC+phMCne/lQSlHZcdCx0cFI255PhscU3nJhbGP2PBDGq5XFhZarZ5NdkTQIDAQABAoIBABm+JTcjcwtZjJ7KVsM7yc2QPs0vq6L8iQ7pTZj3i6N+isU1NJMQOA61kZIurUentrlEB3vRzmVExiv/O8tHRu7B/X5OxATpTbjhUlktxdij0+g3gKLPUeV9I8GcQH71VCQs5H0phNzPgREPGf0hkA0z3rcs1A7b5ndQdAzEU2Ah2jmNbRcyyTaEiYFADF2EmdhVZddF7CTfKZjLviDyXEe3/FHYedl08D+GtITxj8n1WAsxaWVFrwyq9P0USFT/9bQLMia3BnFeKfAUfvgN49uluflcD4/CtbuoKQfFuWVUhtncDaVZzRS7x7SYERptV+MtZvKgh/1vtgPHkVNAz8ECgYEA4iyWrBR8REHdOkRB6vPwLVND+rZ2GRvANolPyKlTIZ02BlJXegcp4RTmt7L8b9STAkL6lDqk0JuA3pASp7eic8X4FFjDKEf+rmyyx8qqwAZvWhLdqBcMwMtyvpTwyGCiv3dwaThtqfT4OZExigKwKDHIGUbmFjlhQGTmw0u0Jj0CgYEAxK6GZ0iYX19UTZY1ZnawmQSPF/PwU69oRu1jlsf2QpM1PfrQr+EDjJJATMBb85/I/ZmZrbmU7OLUKmnyqpBCRSYh6W7xS2x0oPD6cD99j5YgdtAeYdhohDJ2TDWipWEMbhHUtdSU77SYiKlFWVF9nS0MUtrQYGL7E2/xA+9UJ1ECgYAFjmbdL1umKaAPsGGWLgv2cRc4b4cTMtVUAaeOHGrIZp5PJXK0srxapTLNzH3bGXPLGG4jehVWcpuF3DA5Io/BHFnt1ghlUu90xYLW2am8MexGYDRFztsnWVgmSm5n3cfhwENoslQvWq9GasS2yT4enqp1xIIehaZX+KKapZ91WQKBgHiObY3jfpp/CWKhXswWlnrEw50wBjCVhPpsyi2DFhyKtQjvs3kLGKzSfJ1PD03OtFlWDE/jQDjPdLMmy/rmf+h4zjKSsU7FBNwdubSSBjm8ENwjB2x8RNw7Pi3Kdo6eZQsW3OYzjrM7ZH/oGbz86V0tXq9utmlOYo3wgLAjw9ZxAoGAHuhyom2S5z2v7LYlyY00VLCJIMcqlXq1doeD1MKy6gDhTlGQAEhTv+UgseZPJsqCB0jai3V8G1cLvbqZ09HAPXSRs/loeS/Rc2wwFIxQwXVNRcnWh0RsVXHcKxngx1jYFTdD6dKdbIBCyfnIziQ+APkpTsNwqgAoUDNoSmY7mPc=',
        'log'            => [
            'file' => storage_path('logs/alipay.log'),
        ],
    ],

    'wechat' => [
        'app_id'      => '',
        'mch_id'      => '',
        'key'         => '',
        'cert_client' => '',
        'cert_key'    => '',
        'log'         => [
            'file' => storage_path('logs/wechat_pay.log'),
        ],
    ],
];