var express = require('express');
var dbcon = require('./connect_db');
var moment = require('moment');
var router = express.Router();

router.post('/chart_realtimr', function(req, resp, next) {
    var house_master = req.body.house_master;
    // console.log(house_master)
    var data_json = [];
    var dashStatus = [];
    var dashSncanel = [];
    var dashMode = [];
    var newsncanel = [];

    dbcon.query('SELECT * FROM tb3_dashstatus WHERE dashstatus_sn = "' + house_master + '"', function(err, result_0, fields) {
        if (err) {
            console.log(err);
            return;
        } else {
            dashStatus[1] = result_0[0].dashstatus_1_1;
            dashStatus[2] = result_0[0].dashstatus_1_2;
            dashStatus[3] = result_0[0].dashstatus_1_3;
            dashStatus[4] = result_0[0].dashstatus_1_4;
            dashStatus[5] = result_0[0].dashstatus_2_1;
            dashStatus[6] = result_0[0].dashstatus_2_2;
            dashStatus[7] = result_0[0].dashstatus_2_3;
            dashStatus[8] = result_0[0].dashstatus_2_4;
            dashStatus[9] = result_0[0].dashstatus_3_1;
            dashStatus[10] = result_0[0].dashstatus_3_2;
            dashStatus[11] = result_0[0].dashstatus_3_3;
            dashStatus[12] = result_0[0].dashstatus_3_4;
            dashStatus[13] = result_0[0].dashstatus_4_1;
            dashStatus[14] = result_0[0].dashstatus_4_2;
            dashStatus[15] = result_0[0].dashstatus_4_3;
            dashStatus[16] = result_0[0].dashstatus_4_4;
            dashStatus[17] = result_0[0].dashstatus_5_1;
            dashStatus[18] = result_0[0].dashstatus_5_2;
            dashStatus[19] = result_0[0].dashstatus_5_3;
            dashStatus[20] = result_0[0].dashstatus_5_4;
            dashStatus[21] = result_0[0].dashstatus_6_1;
            dashStatus[22] = result_0[0].dashstatus_6_2;
            dashStatus[23] = result_0[0].dashstatus_6_3;
            dashStatus[24] = result_0[0].dashstatus_6_4;
            dashStatus[25] = result_0[0].dashstatus_7_1;
            dashStatus[26] = result_0[0].dashstatus_7_2;
            dashStatus[27] = result_0[0].dashstatus_7_3;
            dashStatus[28] = result_0[0].dashstatus_7_4;
            dashStatus[29] = result_0[0].dashstatus_8_1;
            dashStatus[30] = result_0[0].dashstatus_8_2;
            dashStatus[31] = result_0[0].dashstatus_8_3;
            dashStatus[32] = result_0[0].dashstatus_8_4;
            dashStatus[33] = result_0[0].dashstatus_9_1;
            dashStatus[34] = result_0[0].dashstatus_9_2;
            dashStatus[35] = result_0[0].dashstatus_9_3;
            dashStatus[36] = result_0[0].dashstatus_9_4;
            dashStatus[37] = result_0[0].dashstatus_10_1;
            dashStatus[38] = result_0[0].dashstatus_10_2;
            dashStatus[39] = result_0[0].dashstatus_10_3;
            dashStatus[40] = result_0[0].dashstatus_10_4;
            dashStatus[0] = dashStatus[1] + dashStatus[2] + dashStatus[3] + dashStatus[4] + dashStatus[5] +
                dashStatus[6] + dashStatus[7] + dashStatus[8] + dashStatus[9] + dashStatus[10] +
                dashStatus[11] + dashStatus[12] + dashStatus[13] + dashStatus[14] + dashStatus[15] +
                dashStatus[16] + dashStatus[17] + dashStatus[18] + dashStatus[19] + dashStatus[20] +
                dashStatus[21] + dashStatus[22] + dashStatus[23] + dashStatus[24] + dashStatus[25] +
                dashStatus[26] + dashStatus[27] + dashStatus[28] + dashStatus[29] + dashStatus[30] +
                dashStatus[31] + dashStatus[32] + dashStatus[33] + dashStatus[34] + dashStatus[35] +
                dashStatus[36] + dashStatus[37] + dashStatus[38] + dashStatus[39] + dashStatus[40]
        }
    });
    dbcon.query('SELECT * FROM tb3_sncanel WHERE sncanel_sn = "' + house_master + '"', function(err, result, fields) {
        if (err) {
            console.log(err);
            return;
        } else {
            dashSncanel[1] = result[0].sncanel_1_1;
            dashSncanel[2] = result[0].sncanel_1_2;
            dashSncanel[3] = result[0].sncanel_1_3;
            dashSncanel[4] = result[0].sncanel_1_4;
            dashSncanel[5] = result[0].sncanel_2_1;
            dashSncanel[6] = result[0].sncanel_2_2;
            dashSncanel[7] = result[0].sncanel_2_3;
            dashSncanel[8] = result[0].sncanel_2_4;
            dashSncanel[9] = result[0].sncanel_3_1;
            dashSncanel[10] = result[0].sncanel_3_2;
            dashSncanel[11] = result[0].sncanel_3_3;
            dashSncanel[12] = result[0].sncanel_3_4;
            dashSncanel[13] = result[0].sncanel_4_1;
            dashSncanel[14] = result[0].sncanel_4_2;
            dashSncanel[15] = result[0].sncanel_4_3;
            dashSncanel[16] = result[0].sncanel_4_4;
            dashSncanel[17] = result[0].sncanel_5_1;
            dashSncanel[18] = result[0].sncanel_5_2;
            dashSncanel[19] = result[0].sncanel_5_3;
            dashSncanel[20] = result[0].sncanel_5_4;
            dashSncanel[21] = result[0].sncanel_6_1;
            dashSncanel[22] = result[0].sncanel_6_2;
            dashSncanel[23] = result[0].sncanel_6_3;
            dashSncanel[24] = result[0].sncanel_6_4;
            dashSncanel[25] = result[0].sncanel_7_1;
            dashSncanel[26] = result[0].sncanel_7_2;
            dashSncanel[27] = result[0].sncanel_7_3;
            dashSncanel[28] = result[0].sncanel_7_4;
            dashSncanel[29] = result[0].sncanel_8_1;
            dashSncanel[30] = result[0].sncanel_8_2;
            dashSncanel[31] = result[0].sncanel_8_3;
            dashSncanel[32] = result[0].sncanel_8_4;
            dashSncanel[33] = result[0].sncanel_9_1;
            dashSncanel[34] = result[0].sncanel_9_2;
            dashSncanel[35] = result[0].sncanel_9_3;
            dashSncanel[36] = result[0].sncanel_9_4;
            dashSncanel[37] = result[0].sncanel_10_1;
            dashSncanel[38] = result[0].sncanel_10_2;
            dashSncanel[39] = result[0].sncanel_10_3;
            dashSncanel[40] = result[0].sncanel_10_4;
        }
    });
    dbcon.query('SELECT * FROM tb3_statussn WHERE statussn_sn = "' + house_master + '"', function(err, result_2, fields) {
        if (err) {
            console.log(err);
            return;
        } else {
            dashMode[1] = result_2[0].statussn_1_1;
            dashMode[2] = result_2[0].statussn_1_2;
            dashMode[3] = result_2[0].statussn_1_3;
            dashMode[4] = result_2[0].statussn_1_4;
            dashMode[5] = result_2[0].statussn_2_1;
            dashMode[6] = result_2[0].statussn_2_2;
            dashMode[7] = result_2[0].statussn_2_3;
            dashMode[8] = result_2[0].statussn_2_4;
            dashMode[9] = result_2[0].statussn_3_1;
            dashMode[10] = result_2[0].statussn_3_2;
            dashMode[11] = result_2[0].statussn_3_3;
            dashMode[12] = result_2[0].statussn_3_4;
            dashMode[13] = result_2[0].statussn_4_1;
            dashMode[14] = result_2[0].statussn_4_2;
            dashMode[15] = result_2[0].statussn_4_3;
            dashMode[16] = result_2[0].statussn_4_4;
            dashMode[17] = result_2[0].statussn_5_1;
            dashMode[18] = result_2[0].statussn_5_2;
            dashMode[19] = result_2[0].statussn_5_3;
            dashMode[20] = result_2[0].statussn_5_4;
            dashMode[21] = result_2[0].statussn_6_1;
            dashMode[22] = result_2[0].statussn_6_2;
            dashMode[23] = result_2[0].statussn_6_3;
            dashMode[24] = result_2[0].statussn_6_4;
            dashMode[25] = result_2[0].statussn_7_1;
            dashMode[26] = result_2[0].statussn_7_2;
            dashMode[27] = result_2[0].statussn_7_3;
            dashMode[28] = result_2[0].statussn_7_4;
            dashMode[29] = result_2[0].statussn_8_1;
            dashMode[30] = result_2[0].statussn_8_2;
            dashMode[31] = result_2[0].statussn_8_3;
            dashMode[32] = result_2[0].statussn_8_4;
            dashMode[33] = result_2[0].statussn_9_1;
            dashMode[34] = result_2[0].statussn_9_2;
            dashMode[35] = result_2[0].statussn_9_3;
            dashMode[36] = result_2[0].statussn_9_4;
            dashMode[37] = result_2[0].statussn_10_1;
            dashMode[38] = result_2[0].statussn_10_2;
            dashMode[39] = result_2[0].statussn_10_3;

        }
        if (dashMode[1] == 4 || dashMode[1] == 5) { newsncanel[1] = dashSncanel[1] + "/1000"; } else if (dashMode[1] == 6 || dashMode[1] == 7) { newsncanel[1] = dashSncanel[1] + "/54"; } else { newsncanel[1] = dashSncanel[1]; }
        if (dashMode[2] == 4 || dashMode[2] == 5) { newsncanel[2] = dashSncanel[2] + "/1000"; } else if (dashMode[2] == 6 || dashMode[2] == 7) { newsncanel[2] = dashSncanel[2] + "/54"; } else { newsncanel[2] = dashSncanel[2]; }
        if (dashMode[3] == 4 || dashMode[3] == 5) { newsncanel[3] = dashSncanel[3] + "/1000"; } else if (dashMode[3] == 6 || dashMode[3] == 7) { newsncanel[3] = dashSncanel[3] + "/54"; } else { newsncanel[3] = dashSncanel[3]; }
        if (dashMode[4] == 4 || dashMode[4] == 5) { newsncanel[4] = dashSncanel[4] + "/1000"; } else if (dashMode[4] == 6 || dashMode[4] == 7) { newsncanel[4] = dashSncanel[4] + "/54"; } else { newsncanel[4] = dashSncanel[4]; }
        if (dashMode[5] == 4 || dashMode[5] == 5) { newsncanel[5] = dashSncanel[5] + "/1000"; } else if (dashMode[5] == 6 || dashMode[5] == 7) { newsncanel[5] = dashSncanel[5] + "/54"; } else { newsncanel[5] = dashSncanel[5]; }
        if (dashMode[6] == 4 || dashMode[6] == 5) { newsncanel[6] = dashSncanel[6] + "/1000"; } else if (dashMode[6] == 6 || dashMode[6] == 7) { newsncanel[6] = dashSncanel[6] + "/54"; } else { newsncanel[6] = dashSncanel[6]; }
        if (dashMode[7] == 4 || dashMode[7] == 5) { newsncanel[7] = dashSncanel[7] + "/1000"; } else if (dashMode[7] == 6 || dashMode[7] == 7) { newsncanel[7] = dashSncanel[7] + "/54"; } else { newsncanel[7] = dashSncanel[7]; }
        if (dashMode[8] == 4 || dashMode[8] == 5) { newsncanel[8] = dashSncanel[8] + "/1000"; } else if (dashMode[8] == 6 || dashMode[8] == 7) { newsncanel[8] = dashSncanel[8] + "/54"; } else { newsncanel[8] = dashSncanel[8]; }
        if (dashMode[9] == 4 || dashMode[9] == 5) { newsncanel[9] = dashSncanel[9] + "/1000"; } else if (dashMode[9] == 6 || dashMode[9] == 7) { newsncanel[9] = dashSncanel[9] + "/54"; } else { newsncanel[9] = dashSncanel[9]; }
        if (dashMode[10] == 4 || dashMode[10] == 5) { newsncanel[10] = dashSncanel[10] + "/1000"; } else if (dashMode[10] == 6 || dashMode[10] == 7) { newsncanel[10] = dashSncanel[10] + "/54"; } else { newsncanel[10] = dashSncanel[10]; }
        if (dashMode[11] == 4 || dashMode[11] == 5) { newsncanel[11] = dashSncanel[11] + "/1000"; } else if (dashMode[11] == 6 || dashMode[11] == 7) { newsncanel[11] = dashSncanel[11] + "/54"; } else { newsncanel[11] = dashSncanel[11]; }
        if (dashMode[12] == 4 || dashMode[12] == 5) { newsncanel[12] = dashSncanel[12] + "/1000"; } else if (dashMode[12] == 6 || dashMode[12] == 7) { newsncanel[12] = dashSncanel[12] + "/54"; } else { newsncanel[12] = dashSncanel[12]; }
        if (dashMode[13] == 4 || dashMode[13] == 5) { newsncanel[13] = dashSncanel[13] + "/1000"; } else if (dashMode[13] == 6 || dashMode[13] == 7) { newsncanel[13] = dashSncanel[13] + "/54"; } else { newsncanel[13] = dashSncanel[13]; }
        if (dashMode[14] == 4 || dashMode[14] == 5) { newsncanel[14] = dashSncanel[14] + "/1000"; } else if (dashMode[14] == 6 || dashMode[14] == 7) { newsncanel[14] = dashSncanel[14] + "/54"; } else { newsncanel[14] = dashSncanel[14]; }
        if (dashMode[15] == 4 || dashMode[15] == 5) { newsncanel[15] = dashSncanel[15] + "/1000"; } else if (dashMode[15] == 6 || dashMode[15] == 7) { newsncanel[15] = dashSncanel[15] + "/54"; } else { newsncanel[15] = dashSncanel[15]; }
        if (dashMode[16] == 4 || dashMode[16] == 5) { newsncanel[16] = dashSncanel[16] + "/1000"; } else if (dashMode[16] == 6 || dashMode[16] == 7) { newsncanel[16] = dashSncanel[16] + "/54"; } else { newsncanel[16] = dashSncanel[16]; }
        if (dashMode[17] == 4 || dashMode[17] == 5) { newsncanel[17] = dashSncanel[17] + "/1000"; } else if (dashMode[17] == 6 || dashMode[17] == 7) { newsncanel[17] = dashSncanel[17] + "/54"; } else { newsncanel[17] = dashSncanel[17]; }
        if (dashMode[18] == 4 || dashMode[18] == 5) { newsncanel[18] = dashSncanel[18] + "/1000"; } else if (dashMode[18] == 6 || dashMode[18] == 7) { newsncanel[18] = dashSncanel[18] + "/54"; } else { newsncanel[18] = dashSncanel[18]; }
        if (dashMode[19] == 4 || dashMode[19] == 5) { newsncanel[19] = dashSncanel[19] + "/1000"; } else if (dashMode[19] == 6 || dashMode[19] == 7) { newsncanel[19] = dashSncanel[19] + "/54"; } else { newsncanel[19] = dashSncanel[19]; }
        if (dashMode[20] == 4 || dashMode[20] == 5) { newsncanel[20] = dashSncanel[20] + "/1000"; } else if (dashMode[20] == 6 || dashMode[20] == 7) { newsncanel[20] = dashSncanel[20] + "/54"; } else { newsncanel[20] = dashSncanel[20]; }
        if (dashMode[21] == 4 || dashMode[21] == 5) { newsncanel[21] = dashSncanel[21] + "/1000"; } else if (dashMode[21] == 6 || dashMode[21] == 7) { newsncanel[21] = dashSncanel[21] + "/54"; } else { newsncanel[21] = dashSncanel[21]; }
        if (dashMode[22] == 4 || dashMode[22] == 5) { newsncanel[22] = dashSncanel[22] + "/1000"; } else if (dashMode[22] == 6 || dashMode[22] == 7) { newsncanel[22] = dashSncanel[22] + "/54"; } else { newsncanel[22] = dashSncanel[22]; }
        if (dashMode[23] == 4 || dashMode[23] == 5) { newsncanel[23] = dashSncanel[23] + "/1000"; } else if (dashMode[23] == 6 || dashMode[23] == 7) { newsncanel[23] = dashSncanel[23] + "/54"; } else { newsncanel[23] = dashSncanel[23]; }
        if (dashMode[24] == 4 || dashMode[24] == 5) { newsncanel[24] = dashSncanel[24] + "/1000"; } else if (dashMode[24] == 6 || dashMode[24] == 7) { newsncanel[24] = dashSncanel[24] + "/54"; } else { newsncanel[24] = dashSncanel[24]; }
        if (dashMode[25] == 4 || dashMode[25] == 5) { newsncanel[25] = dashSncanel[25] + "/1000"; } else if (dashMode[25] == 6 || dashMode[25] == 7) { newsncanel[25] = dashSncanel[25] + "/54"; } else { newsncanel[25] = dashSncanel[25]; }
        if (dashMode[26] == 4 || dashMode[26] == 5) { newsncanel[26] = dashSncanel[26] + "/1000"; } else if (dashMode[26] == 6 || dashMode[26] == 7) { newsncanel[26] = dashSncanel[26] + "/54"; } else { newsncanel[26] = dashSncanel[26]; }
        if (dashMode[27] == 4 || dashMode[27] == 5) { newsncanel[27] = dashSncanel[27] + "/1000"; } else if (dashMode[27] == 6 || dashMode[27] == 7) { newsncanel[27] = dashSncanel[27] + "/54"; } else { newsncanel[27] = dashSncanel[27]; }
        if (dashMode[28] == 4 || dashMode[28] == 5) { newsncanel[28] = dashSncanel[28] + "/1000"; } else if (dashMode[28] == 6 || dashMode[28] == 7) { newsncanel[28] = dashSncanel[28] + "/54"; } else { newsncanel[28] = dashSncanel[28]; }
        if (dashMode[29] == 4 || dashMode[29] == 5) { newsncanel[29] = dashSncanel[29] + "/1000"; } else if (dashMode[29] == 6 || dashMode[29] == 7) { newsncanel[29] = dashSncanel[29] + "/54"; } else { newsncanel[29] = dashSncanel[29]; }
        if (dashMode[30] == 4 || dashMode[30] == 5) { newsncanel[30] = dashSncanel[30] + "/1000"; } else if (dashMode[30] == 6 || dashMode[30] == 7) { newsncanel[30] = dashSncanel[30] + "/54"; } else { newsncanel[30] = dashSncanel[30]; }
        if (dashMode[31] == 4 || dashMode[31] == 5) { newsncanel[31] = dashSncanel[31] + "/1000"; } else if (dashMode[31] == 6 || dashMode[31] == 7) { newsncanel[31] = dashSncanel[31] + "/54"; } else { newsncanel[31] = dashSncanel[31]; }
        if (dashMode[32] == 4 || dashMode[32] == 5) { newsncanel[32] = dashSncanel[32] + "/1000"; } else if (dashMode[32] == 6 || dashMode[32] == 7) { newsncanel[32] = dashSncanel[32] + "/54"; } else { newsncanel[32] = dashSncanel[32]; }
        if (dashMode[33] == 4 || dashMode[33] == 5) { newsncanel[33] = dashSncanel[33] + "/1000"; } else if (dashMode[33] == 6 || dashMode[33] == 7) { newsncanel[33] = dashSncanel[33] + "/54"; } else { newsncanel[33] = dashSncanel[33]; }
        if (dashMode[34] == 4 || dashMode[34] == 5) { newsncanel[34] = dashSncanel[34] + "/1000"; } else if (dashMode[34] == 6 || dashMode[34] == 7) { newsncanel[34] = dashSncanel[34] + "/54"; } else { newsncanel[34] = dashSncanel[34]; }
        if (dashMode[35] == 4 || dashMode[35] == 5) { newsncanel[35] = dashSncanel[35] + "/1000"; } else if (dashMode[35] == 6 || dashMode[35] == 7) { newsncanel[35] = dashSncanel[35] + "/54"; } else { newsncanel[35] = dashSncanel[35]; }
        if (dashMode[36] == 4 || dashMode[36] == 5) { newsncanel[36] = dashSncanel[36] + "/1000"; } else if (dashMode[36] == 6 || dashMode[36] == 7) { newsncanel[36] = dashSncanel[36] + "/54"; } else { newsncanel[36] = dashSncanel[36]; }
        if (dashMode[37] == 4 || dashMode[37] == 5) { newsncanel[37] = dashSncanel[37] + "/1000"; } else if (dashMode[37] == 6 || dashMode[37] == 7) { newsncanel[37] = dashSncanel[37] + "/54"; } else { newsncanel[37] = dashSncanel[37]; }
        if (dashMode[38] == 4 || dashMode[38] == 5) { newsncanel[38] = dashSncanel[38] + "/1000"; } else if (dashMode[38] == 6 || dashMode[38] == 7) { newsncanel[38] = dashSncanel[38] + "/54"; } else { newsncanel[38] = dashSncanel[38]; }
        if (dashMode[39] == 4 || dashMode[39] == 5) { newsncanel[39] = dashSncanel[39] + "/1000"; } else if (dashMode[39] == 6 || dashMode[39] == 7) { newsncanel[39] = dashSncanel[39] + "/54"; } else { newsncanel[39] = dashSncanel[39]; }
        if (dashMode[40] == 4 || dashMode[40] == 5) { newsncanel[40] = dashSncanel[40] + "/1000"; } else if (dashMode[40] == 6 || dashMode[40] == 7) { newsncanel[40] = dashSncanel[40] + "/54"; } else { newsncanel[40] = dashSncanel[40]; }


        var start_day = moment().add(-30, 'days').format('YYYY/MM/DD - HH:mm:ss');
        var stop_day = moment().format('YYYY/MM/DD - HH:mm:ss')

        if (dashStatus[0] == 1) {
            // dbcon.query("SELECT * FROM `tb_data_sensor` WHERE `data_sn`='KO7MT001' AND data_date = '2021/07/29'", function(err, res_data, fields) {
            dbcon.query("SELECT data_timestamp, round(" + newsncanel[7] + ", 1) AS new_1 FROM tb_data_sensor WHERE data_sn = '" + house_master + "' AND data_timestamp BETWEEN '" + start_day + "' AND '" + stop_day + "' ORDER BY data_timestamp ", function(err5, res_data, fields) {
                if (err5) throw err5;
                console.log(moment().format('YYYY/MM/DD - HH:mm:ss'));
                resp.json(res_data);
                resp.end();
            });
        } else if (dashStatus[0] == 12) {
            // dbcon.query("SELECT * FROM `tb_data_sensor` WHERE `data_sn`='KO7MT001' AND data_date = '2021/07/29'", function(err, res_data, fields) {
            dbcon.query("SELECT data_timestamp, round(" + newsncanel[1] + ", 1) AS new_1, round(" + newsncanel[2] + ", 1) AS new_2, round(" + newsncanel[3] + ", 1) AS new_3, round(" + newsncanel[4] + ", 1) AS new_4, round(" + newsncanel[5] + ", 1) AS new_5, round(" + newsncanel[6] + ", 1) AS new_6, round(" + newsncanel[7] + ", 1) AS new_7, round(" + newsncanel[8] + ", 1) AS new_8, round(" + newsncanel[9] + ", 1) AS new_9, round(" + newsncanel[10] + ", 1) AS new_10, round(" + newsncanel[11] + ", 1) AS new_11, round(" + newsncanel[12] + ", 1) AS new_12 FROM tb_data_sensor WHERE data_sn = '" + house_master + "' AND data_timestamp BETWEEN '" + start_day + "' AND '" + stop_day + "' ORDER BY data_timestamp ", function(err5, res_data, fields) {
                if (err5) throw err5;
                console.log(moment().format('YYYY/MM/DD - HH:mm:ss'));
                resp.json(res_data);
                resp.end();
            });
        }

        // console.log(date);

    });
});

module.exports = router;