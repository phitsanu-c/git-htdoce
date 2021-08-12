const e = require('express');
var express = require('express');
var dbcon = require('./connect_db');
var router = express.Router();

/* GET users listing. */
router.get('/', function(req, res, next) {
    var userID = req.cookies.statusLogin.userID;
    console.log(req.cookies.statusLogin.userStatus)
    if (req.cookies.statusLogin.userStatus == 1) {
        // console.log('111')
        dbcon.query('SELECT * FROM tb2_site', function(err, result, fields) {
            if (err) throw err;
            var data = [];
            var data2 = [];
            dbcon.query('SELECT * FROM tb2_house INNER JOIN tb2_site ON tb2_house.house_siteID = tb2_site.site_id', function(err2, result2, fields) {
                if (err2) throw err2;
                for (var i = 0; i < result2.length; i++) {
                    // if (result2[i].site_id == 1) {
                    data['siteID'] = result2[i].house_siteID;
                    data['house_master'] = result2[i].house_master;
                    data['house_name'] = result2[i].house_name;
                    // }
                    // if (result2[i].site_id == 2) {
                    //     data2[i] = result2[i].house_master;
                    // }
                    // if (result2[i].site_id == 3) {
                    //     data12[i] = result2[i].house_master;
                    // }
                    data2[1] = data;
                }
                // res.send(data)
                res.render('sel_house', { page: 'selhouse', data_site: result, data_house: result2 });
            });
        });
    } else { console.log('222') }
    // dbcon.query('SELECT * FROM tb2_login WHERE `login_user` = "' + Username + '" AND `login_pass` = "' + newPass + '"', function(err, result, fields) {
    //     if (err) throw err;
    // res.render('sel_house', { page: 'selhouse' });
});

module.exports = router;