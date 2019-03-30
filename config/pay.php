<?php

return [
    'alipay' => [
        'app_id' => '2016092600603081',
        'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAxNPOHIafyA6GmyA1wXtwYwd8oYUWjXD6OVH/WQLQQyrnpfxJ2y8E/HVzMhBNA/zcy3pTpOvWp6n02CzNaNAtpS/QV5PK5UghDJEwaH/WqIcqys67iX+bJlzHffnTyRneCStEw7sVUHWU8oLVueo+OrQmjX8Y+yZVINm62cBa5H4MP7kS3OogMs+wmt3mknLKXIaRS1oPwfH+N7po2n07xBuEASCG3cN+BPXjz49jrMWuxoKq6cq8qHcw5TspLFLKSAVLLyQmC/VXmSdudyiwGuCNTWYLAHHyoUeF83jrkZYUio7fr362Cng1DA78vgy/NVwc+/ZnGZxrbIuV2gWzlwIDAQAB',
        'private_key' => 'MIIEowIBAAKCAQEAo/jw5EZtQXYUw4Q7IM1/jCkVXrcth3lyPuiOEVh+CQbl5cY4tG8MqOLfuBuCAhXCfGGt9JfB11vB1zsSDzueIbpWX2V/5P5/tjj7oBuB1yjXML4O3mObSpRvt+WiicY0BZqAhYihzTb0V/Ss2CHYwEIjzXTgCcN4pYzgZroYQSmFbsGjzuG2IONEA/H1DAjlT8hIxvRhZCIe6pqyrXRnuyXOwyd/+jy5Gdyt/PUvZhbA3ymhHwc5mk9Kgz/B5lkrArb+akZk0gsRbXjXI/4BXzrX7gsLE+3GCb9v2tUP/6qdBWgvr1VqBAyP4iuDLuQxr5JF45fThL+kw8xrgW/lNwIDAQABAoIBAQCKFFQmpvfSLDGIA44XLXW+/cm1HOQGNUrzlror+S0JRPnL6IRPzUQH5CUo0GFGiDRisY7fbfwZ8nblXCT1Fusu089wPfTZTUcWmB2s0f0gxo+PyDyVIaPfxefeIE4jXvjnzxdzW3+FZEWW27/BsZ7pJ8kmdslC74xlPKCrYQKTu54NE1gARx7sQtAjdm/9pjim8P2MZoL+xeF8ocdyeti0Ceynsbvg13VQDkqh7rmQYMjQfC8g3g/qUQYBRjV2SHxk+wa+JOzpeCbc6IiBAXYKFKBOtenpfHYbFbb80hYqyC/NIqHA5DOxU+jNXZlhkZS/ebu7LO9Z6JhQ4Gma1tXBAoGBANRO7JG92AqEzc0P4csoId6QmN3bijj6BoVuuOOWjeyJcV8/SP83Zuvy7PszRgaurktVuFsF0yWDDcid9AVaNwNCfpqxCWboCpRh/cY/96QchgsYgTmJDUN1rKhHjmSqvX+8KsXYc3U17Saw0m8CRabVm9poXJQ83i3Co5yc/UVfAoGBAMW3h4/2XC/jsnkh3OY9O7yYu235hBmoUV66Vz3cM3M9RVOVK27YAlwjJyomSOM258t+xNPjl9zCQI9DVJMOgjgqPq5O68g0mwxNHJjfFIaoinv0/zYq8BkUAl4ZKYZBW8zTl2i/MpxwuErQDeHWzvDlzrwiex6XuNtSwoXYg9cpAoGADbt5I8gixDNo2F2xniFfZ3T03kzH+P17FIBf5yCi12zgb2e5ggCEYLiayXi8i8waq/bEcObEjIWYi6Rj10DJlCVl6P2QfR5/KK/Z6UvT6cKKjQctvJn3yKhA3bWbKTm9/hgesCNa/Hbbewgu5E1CUhM4/HyJmHEDcfRH/uZMn4MCgYBUVjPyGaE7IEI531LttwLrMK8Kext5Ik4LPSsHjQ05Q9J1k7SiJGvlR21mUkxW902qhNmKlJNrrESDl7HUxKSRNpvkGHAEx0O33JCtOML1qaDgvSG7xlcCK4HTB6KpzOlOlpcILD53crF54AN76Pf+09f6ci7YXtmQXF3zX+bk+QKBgD5Cb+kZjdUTtdrOL4FgMy4J46vl4WOTKt/d7fGqt6tQA5ZX78WVCBdlOgDPwtx/sf2sjpoG6SZAHgVqWp0ZY05EsxxxJcOnWE0VqlZoiRpot1HB7P3JJLwo+UKESZSvr3b9nVkcXUSGlviJLSpoGT2VcQPEg7s0/KdaHb0PsuZr',
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