<?php


class MyEncryption
{

    public $pubkey = '-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAwbjAiZfx+IoRmsg2DI/2
1EwAM2N5u25Zj2NQNpbOzbR4VCCV6xNhPBHCXoziCdN2Klwy8zwmLYqNn4aNDt2M
kcWaRKkgx+4zKD0MS/w6GtvNraPWZ+h5d03wzNAZgBh0dLmrgOuId3KkDaiegDe5
s0t6RdxEFq0ASIjgu7eL6QOIYdAkeC5pmLfekadCIOtLr2EN86Dw11+m7vn+kZBh
KhqoLtwo6VWSugfbpxFOgGse+Pz9TQNiRcRDb36r3oOaNHAwlJFOZz9oesMBggus
QmHmfdySIYKbP6Yl2P3TL/XPXe6Iwlq2AOuLxbpjUG2V2u7ZTRQxtYHV/ncyeF/m
QwIDAQAB
-----END PUBLIC KEY-----';
    public $privkey = "-----BEGIN RSA PRIVATE KEY-----
MIIEowIBAAKCAQEAwbjAiZfx+IoRmsg2DI/21EwAM2N5u25Zj2NQNpbOzbR4VCCV
6xNhPBHCXoziCdN2Klwy8zwmLYqNn4aNDt2MkcWaRKkgx+4zKD0MS/w6GtvNraPW
Z+h5d03wzNAZgBh0dLmrgOuId3KkDaiegDe5s0t6RdxEFq0ASIjgu7eL6QOIYdAk
eC5pmLfekadCIOtLr2EN86Dw11+m7vn+kZBhKhqoLtwo6VWSugfbpxFOgGse+Pz9
TQNiRcRDb36r3oOaNHAwlJFOZz9oesMBggusQmHmfdySIYKbP6Yl2P3TL/XPXe6I
wlq2AOuLxbpjUG2V2u7ZTRQxtYHV/ncyeF/mQwIDAQABAoIBAGah3BfJkV+svnDz
e3ciWpHVBhIztI2xg+9snVWehkgDQfDIJsUZSl2JxyFSoHq2Npdwq2mkR1G/YxLO
NTNX+x5Lw1R3CjACKcY6uaYUJjCOnSROdcwtJRUpDNdltOzhh+lDaPJvVqh56yJ1
YCvr2g18gnY6oTQmSc0j/3RUZOJ4mAwhoV41i9kRdsmFGs+ccStfJ4jmeKQxLDtx
YyAhRPbvAtrIu+zmJ0ZS98Cd7OahJJ1FSkbq5Zx392OwgpBHpPcAcb/hY1GAqm6v
qA7HkrvSj5bBRdZp7/4KXQf00SVOFLbDKGr6qsW51U1bXkiaNBd1RM6chdqH2kUE
B1+eJaECgYEA+rDhg31Za4GOZS1ohP8SmJZg4R0Nfu3l7r9Ldz455r0k/Mavhzwo
SrYxKK5IL4QbgPPLjkNwPhJKMg9Lcv79Zr+bfy/uKebju2juJuWJLuEeXhblJPVN
W5Gqh26zom0PWP7VsYVX5cWaVtfbr9bvvpzyBJ5jFPq/MmGhAMuHtFECgYEAxdMD
Ru8Oz8h7VpzsLiJB7BIW+Sy8y+UzUYEmRTFYV8kWEX7uPiwgKdGckcB63e+1ypR7
Whxy0ka9Bg+IPTH/a29sYXd9OpWjClYVTcK2VziwC+X9l+T+R5OKXFfFEbKebW3Z
+guntNK51IwRl7NSfzAs22DFWu+GKrAlAHZtcFMCgYBXC7wCUDAQaDftYcr9AySN
3wlcoR3iiPBh6gJmMTEhsWN6cfLY3kaPSpvfKETgWtrB9+UiTMBYjTk+EJl+IJQU
bUus6hOkcQt6M4Ed+G2d3YUR3plKL/LgbL/trr6pE31UxYel0Eso+WgR53ncoKE2
aoCOogB9dGOXNtcU05cXQQKBgQDBuaIE7giwPGFkcWnsx8mM2C49N61vcvXthC8p
JWihFyAQZCAFLIsWyNmt9jOccamyR/QAS8m52GI1tDIz02mRGV2mmTA+ldlDPwe/
zcVo5u+nx0OvYyYMjBS714v6h9QTz7bd4loKfy5SUhTMXWSVf2T+NOcv5U6bMUIb
EN6dVwKBgCloZBHh2HcUvueM/ozmlCZVouQWZfW+F8t7xmVFObk0oqa0qU+9/kDE
DV+QkxJ/Ti3Y0nrX3WTt/ZmVR6x+r07WFVrlzGA+kCZT18TtUELWsDw1uC390hqQ
UffM9eINLi9JzdNmprPs90GtxlmMerkgxCsMRHDAMZlLzJRflkkN
-----END RSA PRIVATE KEY-----";

    public function crypt($data)
    {
        if (openssl_public_encrypt($data, $encrypted, $this->pubkey))
            $data = base64_encode($encrypted);
        else
            throw new Exception('Unable to encrypt data. Perhaps it is bigger than the key size?');

        return $data;
    }

    public function decrypt($data)
    {
        if (openssl_private_decrypt(base64_decode($data), $decrypted, $this->privkey))
            $data = $decrypted;
        else
            $data = '';

        return $data;
    }
}



$d = new MyEncryption() ; 
$c = $d->crypt("
Your question is a bit unclear. A certificate (what you usually store in a .crt file) contains a public key, but a public key in itself is not a certificate – Mathias R. Jessen Jun 10 '17 at 14:") ;
$i = $d->decrypt($c) ; 

print base64_decode($c) ;
print "\n"; 
print $i ; 
