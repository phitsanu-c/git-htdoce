var express = require('express');
var dbcon = require('./connect_db');
var sha256 = require('js-sha256');
var router = express.Router();

/* GET users listing. */
router.get('/', function(req, res, next) {
    // res.render('page_login', { title: 'Express' });
    if (req.cookies.statusLogin) {
        console.log(req.cookies.statusLogin);
        res.render('index', { page: 'index' });
    } else {
        res.render('page_login');
    }
});

router.post('/login', function(req, res, next) {
    const { Username, Password } = req.body;
    // if (Username === '') {
    //     res.locals.statusLogin = { msgUser: 'No user', user: Username }
    //     res.render('page_login')
    //     next()
    // }
    // if (Password === '') {
    //     res.locals.statusLogin = { msgPass: 'No pass', user: Username }
    //     res.render('page_login')
    //     next()
    // }
    // ==============================================
    var key = 'tikde78uj4ujuhlaoikiksakeidke';
    var newPass = sha256.hmac(key, Password);
    dbcon.query('SELECT * FROM tb2_login WHERE `login_user` = "' + Username + '" AND `login_pass` = "' + newPass + '"', function(err, result, fields) {
        if (err) throw err;

        // console.log(result[0].login_user);
        // next()
        if (result.length > 0) {
            var msgLogin = {
                userID: result[0].login_id,
                username: Username,
                userStatus: result[0].login_status,
                userImg: result[0].login_image
            };
            res.cookie('statusLogin', msgLogin)
            if (result[0].login_status == 1) {
                res.redirect('/selhouse');
            } else {
                res.redirect('/');
            }

            // console.log(results.length);
            // return false;
            // req.session.ifLogin = true;
            // req.session.login_user = username;
            // res.render('index', {
            //     name: username
            // });
            // console.log(username);
        } else {
            res.locals.statusLogin = { msgUser: 'No user', msgPass: 'No pass', user: '' }
            res.render('page_login')
                // res.render('page_login', {
                //     res: "Username หรือ Password ไม่ถูกต้อง !!"
                // });
                // console.log("Username หรือ Password ไม่ถูกต้อง !!");
        }
        res.end();
    });


    // if (typeof req.cookies.user === 'undefined') { req.cookies.user = 'zzzzzzzz';
    // console.log("fdfdfdffd"); } else { console.log('55555555') }
    // res.session.user = "aaaaaa";

    // 



});

module.exports = router;