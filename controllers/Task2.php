<?php
class Controller extends BifrostRouter\BaseController {
    public static function run($request) {
        if(isset($_GET['resource'])){
            $host = parse_url($_GET['resource'], PHP_URL_HOST);
            $blacklist = [
                '127.0.0.1', 'localhost', '0.0.0.0', '0', '127.1', '::1', '[::]', '127.127.127.127',
                '127.0.1.3', '127.0.0.0', '2130706433', '017700000001', '3232235521', '3232235777',
                '0x7f000001', '0xc0a80014', '{domain}@127.0.0.1', '127.0.0.1#{domain}', '{domain}.127.0.0.1',
                '127.0.0.1/{domain}', '127.0.0.1/?d={domain}', '{domain}@127.0.0.1', '127.0.0.1#{domain}',
                '{domain}.127.0.0.1', '127.0.0.1/{domain}', '127.0.0.1/?d={domain}', '{domain}@localhost',
                'localhost#{domain}', 'localhost/{domain}', 'localhost/?d={domain}', '127.0.0.1%00{domain}',
                '127.0.0.1?{domain}', '127.0.0.1///{domain}', '/127.0.0.1%00{domain}', '//127.0.0.1?{domain}',
                '127.0.0.1///{domain}', 'localtest.me', 'customer1.app.localhost.my.company.127.0.0.1.nip.io',
                'mail.ebc.apple.com', '127.0.0.1.nip.io', 'www.example.com.customlookup.www.google.com.endcustom.sentinel.pentesting.us',
                'customer1.app.localhost.my.company.127.0.0.1.nip.io', 'bugbounty.dod.network',
                '1ynrnhl.xip.io', 'spoofed.burpcollaborator.net', '1.1.1.1 &@2.2.2.2#',
                '127.1.1.1/@127.2.2.2', '127.1.1.1:80\@@127.2.2.2', '127.1.1.1:80:\@@127.2.2.2',
                '127.1.1.1:80#\@127.2.2.2'
            ];

            if(in_array($host, $blacklist)){
                return 403;
            }

            if (preg_match('~127.~', $host)){
                return 403;
            }
            if (preg_match('~localhost~', $host)){
                return 403;
            }
            if (preg_match('~xip.io~', $host)){
                return 403;
            }
            if (preg_match('~nip.io~', $host)){
                return 403;
            }
            if (preg_match('~localdomain.pw~', $host)){
                return 403;
            }
            if (preg_match('~。~', $host)){
                return 403;
            }
            if (preg_match('~｡~', $host)){
                return 403;
            }
            if (preg_match('~{domain}~', $host)){
                return 403;
            }
            if (preg_match('~@~', $host)){
                return 403;
            }
            if (preg_match('~#~', $host)){
                return 403;
            }
            if (preg_match('~lookup~', $host)){
                return 403;
            }
            if (preg_match('~:~', $host)){
                return 403;
            }
            
            header('Content-Type: image/jpeg');
            $fp = fopen($_GET['resource'], 'rb');
            fpassthru($fp);
        } else {
            BifrostRouter\Twig::render('task2.html');
        }
    }
}
