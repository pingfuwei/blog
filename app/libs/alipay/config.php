<?php
$config = array (	
		//应用ID,您的APPID。
		'app_id' => "2016101800717616",

		//商户私钥，您的原始格式RSA私钥
		'merchant_private_key' => "MIIEpAIBAAKCAQEAttUOkg8UxrH2L8byBJQky8wIr7oJBMVSz9FkPF6dcAPwjPnzq4I6w68zyODFsZ/YwXiGZ2Ur4JpVLDZZineE4oUbYsOKBYXXJ8cSSm9IZhNvzN421X/k9Einis/ivD+jqNtH7jK58Tt47RZ6dzKMGP5KQ9L0U5HS45cRh49GoYAGt5Yc+zLlGZVcSq5R000KllWVzLQ+KTKMs42KZ6ZS7DtSZMBKFRNyoc+qPMOFxunmhbBGHePPygjzvKSd2K8VoCrEI89xiNRXY3luEx3SeBHLYs+8mAqR4ocl3xspY/1kmrLBD5eNb7++fNVL9HqPlSYLIe21j+J7rhZ9Qp9+KwIDAQABAoIBAGq8b0ktrL9i3Yp+5oNtyR2A/AE65lD2saXJZG8p/VeLtT9YHL0fxha/jcfUERXlb7FjH3P1SGxTLS4mfJetttJXSumZplYbEMSUH0V9OhL9feNoRzLU+2DxmX4cZw3nSTAm9BNHYe5G/g3LdatowwlESy7VVPYEx80+QGmXZ3CYRGvYss/ARO4GEy8hVgFQWKx9WHrCObhCGbTdc1w3s4UYm9doPj/fWkctq+SEJHY0ye1YgdEEy6r9Xtq3mT0FZD/zinKDy25D99jh/W8yPjPyqszoNOV/n704RCpScaGKUhr/tZWmnhUTOxlXZ959CN2rge//HGPs2q1O0ugGe0ECgYEA4ylou1mg4GYWlqzOod6T7qfQ3y6g1nOq3xHWbV1LQvCU7UR/ec5hZfYcf/xjghZV8RmNn8OzbtB3T3VYCVKvJJ7t5prGavXAdr/1RNYxa5OcJseyiRSBAzzX0jcG0eQ9HzEHa38iVm5b5bPAuvxXuQKgQ6FpZDwdFLwsc7ioo9MCgYEAzgr4sQmiy4RzSDD+TEuA+J/DtbvK83ttD7rFss1QEGfpFdLMANo8btoOTbMPQpjGs+p/9KCkSke9hdH5nH66o+ox9M5yW1K2snAd2kaIshyvdk5+o0UXxi1oBH9TqpNKDkveV82qlaVWyOI40uB/SUQMHJbAPYBaHRaEhOBSvUkCgYEA1FZEu7uQEbHbs4RcshooFZFwQO6JEWyVcGZwFVJ7o1rXGuJIdkdf67sd8NSu/055jyDfrVN1SkQ7Al8hp7VOWeDlaAWNKzYEbfwI/Atrrq8P64AHdvNflPMumiUtjszWBW4DDYyNQFVwOUrJAQAXz6yQuicLKNK4LEWpF5KosFkCgYBX2be1jF08FyosIq+aiirgVwZUK1DaRcr3hPQcS4wSoqtwIaPXzTUtMo4ctPcRtyApwBd0jzXdcf8t2pxqDGK51vYb4hZCN98r77/avG42OyLY95jpNmFvnxaVrFBZD1npBJI1r7xG9+sr1cDSsOO0sm3Tlrc6wcoqUtqH6Tl9+QKBgQC+ejhNo41SiOdjdlyNjviePbaa1UPxMMc48K/mDRHr2LftmqcTCKlKEDRPScTRZalzgDkJL08kOHspfROE7LK+1vfi10bn5Fm4ublbhaS9ruNqbriHQdGqdGh29w95R87KXZdqY1MBuaZ32KRfH3kbGTx3RdjNCyQyaLq9ovRJ9A==",
		
		//异步通知地址
		'notify_url' => "http://工程公网访问地址/alipay.trade.wap.pay-PHP-UTF-8/notify_url.php",
		
		//同步跳转
		'return_url' => "http://mitsein.com/alipay.trade.wap.pay-PHP-UTF-8/return_url.php",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAg6zC1O82rzplqEjLW+Di9J3ScMqhC5jkO79638Tt8qNup1ZNRMWO2vV3TkmxNlz8B/IH8DgQFH/mKGfkK2+VqmU0Gjgo7ugeHcRyQVpIgw26oX9QFkP1R6dlH9rT55jchk7GbvZFm1QlY4214O+Tjb3aWq6sUZamZ5Dks1D4tTqHRMHoi+s2p6AFUGDOUFzLxdOVnmFiHEkbbGkEjdczyqOI5/C9uvXMrDZEK6VVhv1OZwtIE7yhk5CrXeJUPvubpA62K6uNPPVu5wts6pQ+dUvg1hlo4XftmdgUr1vORc72rYXeCXlig/zu6KRT6GGEIxm7bNHOlEi4DK03BrjdcwIDAQAB",
		
	
);