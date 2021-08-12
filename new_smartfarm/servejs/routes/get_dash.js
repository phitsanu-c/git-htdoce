var express = require('express');
var dbcon = require('./connect_db');
var router = express.Router();

router.post('/dash', function(req, res, next) {
    var house_master = req.body.house_master;
    console.log(house_master)
    var data_json = [];
    var dashStatus = [];
    var dashName = [];
    var dashSncanel = [];
    var dashMode = [];
    var dashImg = [];
    var dashUnit = [];
    var controlstatus = [];
    var controlcanel = [];
    var imgCon = [];
    var s_master = [];
    var conttrolname = [];
    dbcon.query('SELECT * FROM tb2_house INNER JOIN tb2_site ON tb2_house.house_siteID = tb2_site.site_id WHERE house_master = "' + house_master + '"', function(err, result_s, fields) {
        if (err) {
            console.log(err);
            return;
        } else {
            s_master = {
                'siteID': result_s[0].house_siteID,
                'site_name': result_s[0].site_name,
                'site_Latitude': result_s[0].site_Latitude,
                'site_Longitude': result_s[0].site_Longitude,
                'site_img': result_s[0].site_img,
                'house_master': result_s[0].house_master,
                'house_name': result_s[0].house_name,
                'house_image': result_s[0].house_image,
                'mapAll_image': result_s[0].house_img_map
            }
        }
    });
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
            // console.log(house_master)
            // res.status(200).json(dashStatus)
            // res.end();
        }
        // return false;
        dbcon.query('SELECT * FROM tb3_dashname WHERE dashname_sn = "' + house_master + '"', function(err, result, fields) {
            if (err) {
                console.log(err);
                return;
            } else {
                dashName[1] = result[0].dashname_1_1;
                dashName[2] = result[0].dashname_1_2;
                dashName[3] = result[0].dashname_1_3;
                dashName[4] = result[0].dashname_1_4;
                dashName[5] = result[0].dashname_2_1;
                dashName[6] = result[0].dashname_2_2;
                dashName[7] = result[0].dashname_2_3;
                dashName[8] = result[0].dashname_2_4;
                dashName[9] = result[0].dashname_3_1;
                dashName[10] = result[0].dashname_3_2;
                dashName[11] = result[0].dashname_3_3;
                dashName[12] = result[0].dashname_3_4;
                dashName[13] = result[0].dashname_4_1;
                dashName[14] = result[0].dashname_4_2;
                dashName[15] = result[0].dashname_4_3;
                dashName[16] = result[0].dashname_4_4;
                dashName[17] = result[0].dashname_5_1;
                dashName[18] = result[0].dashname_5_2;
                dashName[19] = result[0].dashname_5_3;
                dashName[20] = result[0].dashname_5_4;
                dashName[21] = result[0].dashname_6_1;
                dashName[22] = result[0].dashname_6_2;
                dashName[23] = result[0].dashname_6_3;
                dashName[24] = result[0].dashname_6_4;
                dashName[25] = result[0].dashname_7_1;
                dashName[26] = result[0].dashname_7_2;
                dashName[27] = result[0].dashname_7_3;
                dashName[28] = result[0].dashname_7_4;
                dashName[29] = result[0].dashname_8_1;
                dashName[30] = result[0].dashname_8_2;
                dashName[31] = result[0].dashname_8_3;
                dashName[32] = result[0].dashname_8_4;
                dashName[33] = result[0].dashname_9_1;
                dashName[34] = result[0].dashname_9_2;
                dashName[35] = result[0].dashname_9_3;
                dashName[36] = result[0].dashname_9_4;
                dashName[37] = result[0].dashname_10_1;
                dashName[38] = result[0].dashname_10_2;
                dashName[39] = result[0].dashname_10_3;
                dashName[40] = result[0].dashname_10_4;
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
                dashMode[40] = result_2[0].statussn_10_4;

                if (dashStatus[1] == 1) {
                    dbcon.query('SELECT * from tb_sensor  WHERE sensor_id = "' + dashMode[1] + '"', function(err, ress, fields) {
                        if (err) {
                            console.log(err);
                            return;
                        } else {
                            dashImg[1] = ress[0].sensor_imgNor;
                            dashUnit[1] = ress[0].sensor_unit;
                        }
                    });
                }
                if (dashStatus[2] == 1) {
                    dbcon.query('SELECT * from tb_sensor  WHERE sensor_id = "' + dashMode[2] + '"', function(err, ress, fields) {
                        if (err) {
                            console.log(err);
                            return;
                        } else {
                            dashImg[2] = ress[0].sensor_imgNor;
                            dashUnit[2] = ress[0].sensor_unit;
                        }
                    });
                }
                if (dashStatus[3] == 1) {
                    dbcon.query('SELECT * from tb_sensor  WHERE sensor_id = "' + dashMode[3] + '"', function(err, ress, fields) {
                        if (err) {
                            console.log(err);
                            return;
                        } else {
                            dashImg[3] = ress[0].sensor_imgNor;
                            dashUnit[3] = ress[0].sensor_unit;
                        }
                    });
                }
                if (dashStatus[4] == 1) {
                    dbcon.query('SELECT * from tb_sensor  WHERE sensor_id = "' + dashMode[4] + '"', function(err, ress, fields) {
                        if (err) {
                            console.log(err);
                            return;
                        } else {
                            dashImg[4] = ress[0].sensor_imgNor;
                            dashUnit[4] = ress[0].sensor_unit;
                        }
                    });
                }
                if (dashStatus[5] == 1) {
                    dbcon.query('SELECT * from tb_sensor  WHERE sensor_id = "' + dashMode[5] + '"', function(err, ress, fields) {
                        if (err) {
                            console.log(err);
                            return;
                        } else {
                            dashImg[5] = ress[0].sensor_imgNor;
                            dashUnit[5] = ress[0].sensor_unit;
                        }
                    });
                }
                if (dashStatus[6] == 1) {
                    dbcon.query('SELECT * from tb_sensor  WHERE sensor_id = "' + dashMode[6] + '"', function(err, ress, fields) {
                        if (err) {
                            console.log(err);
                            return;
                        } else {
                            dashImg[6] = ress[0].sensor_imgNor;
                            dashUnit[6] = ress[0].sensor_unit;
                        }
                    });
                }
                if (dashStatus[7] == 1) {
                    dbcon.query('SELECT * from tb_sensor  WHERE sensor_id = "' + dashMode[7] + '"', function(err, ress, fields) {
                        if (err) {
                            console.log(err);
                            return;
                        } else {
                            dashImg[7] = ress[0].sensor_imgNor;
                            dashUnit[7] = ress[0].sensor_unit;
                        }
                    });
                }
                if (dashStatus[8] == 1) {
                    dbcon.query('SELECT * from tb_sensor  WHERE sensor_id = "' + dashMode[8] + '"', function(err, ress, fields) {
                        if (err) {
                            console.log(err);
                            return;
                        } else {
                            dashImg[8] = ress[0].sensor_imgNor;
                            dashUnit[8] = ress[0].sensor_unit;
                        }
                    });
                }
                if (dashStatus[9] == 1) {
                    dbcon.query('SELECT * from tb_sensor  WHERE sensor_id = "' + dashMode[9] + '"', function(err, ress, fields) {
                        if (err) {
                            console.log(err);
                            return;
                        } else {
                            dashImg[9] = ress[0].sensor_imgNor;
                            dashUnit[9] = ress[0].sensor_unit;
                        }
                    });
                }
                if (dashStatus[10] == 1) {
                    dbcon.query('SELECT * from tb_sensor  WHERE sensor_id = "' + dashMode[10] + '"', function(err, ress, fields) {
                        if (err) {
                            console.log(err);
                            return;
                        } else {
                            dashImg[10] = ress[0].sensor_imgNor;
                            dashUnit[10] = ress[0].sensor_unit;
                        }
                    });
                }
                if (dashStatus[11] == 1) {
                    dbcon.query('SELECT * from tb_sensor  WHERE sensor_id = "' + dashMode[11] + '"', function(err, ress, fields) {
                        if (err) {
                            console.log(err);
                            return;
                        } else {
                            dashImg[11] = ress[0].sensor_imgNor;
                            dashUnit[11] = ress[0].sensor_unit;
                        }
                    });
                }
                if (dashStatus[12] == 1) {
                    dbcon.query('SELECT * from tb_sensor  WHERE sensor_id = "' + dashMode[12] + '"', function(err, ress, fields) {
                        if (err) {
                            console.log(err);
                            return;
                        } else {
                            dashImg[12] = ress[0].sensor_imgNor;
                            dashUnit[12] = ress[0].sensor_unit;
                        }
                    });
                }
                if (dashStatus[13] == 1) {
                    dbcon.query('SELECT * from tb_sensor  WHERE sensor_id = "' + dashMode[13] + '"', function(err, ress, fields) {
                        if (err) {
                            console.log(err);
                            return;
                        } else {
                            dashImg[13] = ress[0].sensor_imgNor;
                            dashUnit[13] = ress[0].sensor_unit;
                        }
                    });
                }
                if (dashStatus[14] == 1) {
                    dbcon.query('SELECT * from tb_sensor  WHERE sensor_id = "' + dashMode[14] + '"', function(err, ress, fields) {
                        if (err) {
                            console.log(err);
                            return;
                        } else {
                            dashImg[14] = ress[0].sensor_imgNor;
                            dashUnit[14] = ress[0].sensor_unit;
                        }
                    });
                }
                if (dashStatus[15] == 1) {
                    dbcon.query('SELECT * from tb_sensor  WHERE sensor_id = "' + dashMode[15] + '"', function(err, ress, fields) {
                        if (err) {
                            console.log(err);
                            return;
                        } else {
                            dashImg[15] = ress[0].sensor_imgNor;
                            dashUnit[15] = ress[0].sensor_unit;
                        }
                    });
                }
                if (dashStatus[16] == 1) {
                    dbcon.query('SELECT * from tb_sensor  WHERE sensor_id = "' + dashMode[16] + '"', function(err, ress, fields) {
                        if (err) {
                            console.log(err);
                            return;
                        } else {
                            dashImg[16] = ress[0].sensor_imgNor;
                            dashUnit[16] = ress[0].sensor_unit;
                        }
                    });
                }
                if (dashStatus[17] == 1) {
                    dbcon.query('SELECT * from tb_sensor  WHERE sensor_id = "' + dashMode[17] + '"', function(err, ress, fields) {
                        if (err) {
                            console.log(err);
                            return;
                        } else {
                            dashImg[17] = ress[0].sensor_imgNor;
                            dashUnit[17] = ress[0].sensor_unit;
                        }
                    });
                }
                if (dashStatus[18] == 1) {
                    dbcon.query('SELECT * from tb_sensor  WHERE sensor_id = "' + dashMode[18] + '"', function(err, ress, fields) {
                        if (err) {
                            console.log(err);
                            return;
                        } else {
                            dashImg[18] = ress[0].sensor_imgNor;
                            dashUnit[18] = ress[0].sensor_unit;
                        }
                    });
                }
                if (dashStatus[19] == 1) {
                    dbcon.query('SELECT * from tb_sensor  WHERE sensor_id = "' + dashMode[19] + '"', function(err, ress, fields) {
                        if (err) {
                            console.log(err);
                            return;
                        } else {
                            dashImg[19] = ress[0].sensor_imgNor;
                            dashUnit[19] = ress[0].sensor_unit;
                        }
                    });
                }
                if (dashStatus[20] == 1) {
                    dbcon.query('SELECT * from tb_sensor  WHERE sensor_id = "' + dashMode[20] + '"', function(err, ress, fields) {
                        if (err) {
                            console.log(err);
                            return;
                        } else {
                            dashImg[20] = ress[0].sensor_imgNor;
                            dashUnit[20] = ress[0].sensor_unit;
                        }
                    });
                }
                if (dashStatus[21] == 1) {
                    dbcon.query('SELECT * from tb_sensor  WHERE sensor_id = "' + dashMode[21] + '"', function(err, ress, fields) {
                        if (err) {
                            console.log(err);
                            return;
                        } else {
                            dashImg[21] = ress[0].sensor_imgNor;
                            dashUnit[21] = ress[0].sensor_unit;
                        }
                    });
                }
                if (dashStatus[22] == 1) {
                    dbcon.query('SELECT * from tb_sensor  WHERE sensor_id = "' + dashMode[22] + '"', function(err, ress, fields) {
                        if (err) {
                            console.log(err);
                            return;
                        } else {
                            dashImg[22] = ress[0].sensor_imgNor;
                            dashUnit[22] = ress[0].sensor_unit;
                        }
                    });
                }
                if (dashStatus[23] == 1) {
                    dbcon.query('SELECT * from tb_sensor  WHERE sensor_id = "' + dashMode[23] + '"', function(err, ress, fields) {
                        if (err) {
                            console.log(err);
                            return;
                        } else {
                            dashImg[23] = ress[0].sensor_imgNor;
                            dashUnit[23] = ress[0].sensor_unit;
                        }
                    });
                }
                if (dashStatus[24] == 1) {
                    dbcon.query('SELECT * from tb_sensor  WHERE sensor_id = "' + dashMode[24] + '"', function(err, ress, fields) {
                        if (err) {
                            console.log(err);
                            return;
                        } else {
                            dashImg[24] = ress[0].sensor_imgNor;
                            dashUnit[24] = ress[0].sensor_unit;
                        }
                    });
                }
                if (dashStatus[25] == 1) {
                    dbcon.query('SELECT * from tb_sensor  WHERE sensor_id = "' + dashMode[25] + '"', function(err, ress, fields) {
                        if (err) {
                            console.log(err);
                            return;
                        } else {
                            dashImg[25] = ress[0].sensor_imgNor;
                            dashUnit[25] = ress[0].sensor_unit;
                        }
                    });
                }
                if (dashStatus[26] == 1) {
                    dbcon.query('SELECT * from tb_sensor  WHERE sensor_id = "' + dashMode[26] + '"', function(err, ress, fields) {
                        if (err) {
                            console.log(err);
                            return;
                        } else {
                            dashImg[26] = ress[0].sensor_imgNor;
                            dashUnit[26] = ress[0].sensor_unit;
                        }
                    });
                }
                if (dashStatus[27] == 1) {
                    dbcon.query('SELECT * from tb_sensor  WHERE sensor_id = "' + dashMode[27] + '"', function(err, ress, fields) {
                        if (err) {
                            console.log(err);
                            return;
                        } else {
                            dashImg[27] = ress[0].sensor_imgNor;
                            dashUnit[27] = ress[0].sensor_unit;
                        }
                    });
                }
                if (dashStatus[28] == 1) {
                    dbcon.query('SELECT * from tb_sensor  WHERE sensor_id = "' + dashMode[28] + '"', function(err, ress, fields) {
                        if (err) {
                            console.log(err);
                            return;
                        } else {
                            dashImg[28] = ress[0].sensor_imgNor;
                            dashUnit[28] = ress[0].sensor_unit;
                        }
                    });
                }
                if (dashStatus[29] == 1) {
                    dbcon.query('SELECT * from tb_sensor  WHERE sensor_id = "' + dashMode[29] + '"', function(err, ress, fields) {
                        if (err) {
                            console.log(err);
                            return;
                        } else {
                            dashImg[29] = ress[0].sensor_imgNor;
                            dashUnit[29] = ress[0].sensor_unit;
                        }
                    });
                }
                if (dashStatus[30] == 1) {
                    dbcon.query('SELECT * from tb_sensor  WHERE sensor_id = "' + dashMode[30] + '"', function(err, ress, fields) {
                        if (err) {
                            console.log(err);
                            return;
                        } else {
                            dashImg[30] = ress[0].sensor_imgNor;
                            dashUnit[30] = ress[0].sensor_unit;
                        }
                    });
                }
                if (dashStatus[31] == 1) {
                    dbcon.query('SELECT * from tb_sensor  WHERE sensor_id = "' + dashMode[31] + '"', function(err, ress, fields) {
                        if (err) {
                            console.log(err);
                            return;
                        } else {
                            dashImg[31] = ress[0].sensor_imgNor;
                            dashUnit[31] = ress[0].sensor_unit;
                        }
                    });
                }
                if (dashStatus[32] == 1) {
                    dbcon.query('SELECT * from tb_sensor  WHERE sensor_id = "' + dashMode[32] + '"', function(err, ress, fields) {
                        if (err) {
                            console.log(err);
                            return;
                        } else {
                            dashImg[32] = ress[0].sensor_imgNor;
                            dashUnit[32] = ress[0].sensor_unit;
                        }
                    });
                }
                if (dashStatus[33] == 1) {
                    dbcon.query('SELECT * from tb_sensor  WHERE sensor_id = "' + dashMode[33] + '"', function(err, ress, fields) {
                        if (err) {
                            console.log(err);
                            return;
                        } else {
                            dashImg[33] = ress[0].sensor_imgNor;
                            dashUnit[33] = ress[0].sensor_unit;
                        }
                    });
                }
                if (dashStatus[34] == 1) {
                    dbcon.query('SELECT * from tb_sensor  WHERE sensor_id = "' + dashMode[34] + '"', function(err, ress, fields) {
                        if (err) {
                            console.log(err);
                            return;
                        } else {
                            dashImg[34] = ress[0].sensor_imgNor;
                            dashUnit[34] = ress[0].sensor_unit;
                        }
                    });
                }
                if (dashStatus[35] == 1) {
                    dbcon.query('SELECT * from tb_sensor  WHERE sensor_id = "' + dashMode[35] + '"', function(err, ress, fields) {
                        if (err) {
                            console.log(err);
                            return;
                        } else {
                            dashImg[35] = ress[0].sensor_imgNor;
                            dashUnit[35] = ress[0].sensor_unit;
                        }
                    });
                }
                if (dashStatus[36] == 1) {
                    dbcon.query('SELECT * from tb_sensor  WHERE sensor_id = "' + dashMode[36] + '"', function(err, ress, fields) {
                        if (err) {
                            console.log(err);
                            return;
                        } else {
                            dashImg[36] = ress[0].sensor_imgNor;
                            dashUnit[36] = ress[0].sensor_unit;
                        }
                    });
                }
                if (dashStatus[37] == 1) {
                    dbcon.query('SELECT * from tb_sensor  WHERE sensor_id = "' + dashMode[37] + '"', function(err, ress, fields) {
                        if (err) {
                            console.log(err);
                            return;
                        } else {
                            dashImg[37] = ress[0].sensor_imgNor;
                            dashUnit[37] = ress[0].sensor_unit;
                        }
                    });
                }
                if (dashStatus[38] == 1) {
                    dbcon.query('SELECT * from tb_sensor  WHERE sensor_id = "' + dashMode[38] + '"', function(err, ress, fields) {
                        if (err) {
                            console.log(err);
                            return;
                        } else {
                            dashImg[38] = ress[0].sensor_imgNor;
                            dashUnit[38] = ress[0].sensor_unit;
                        }
                    });
                }
                if (dashStatus[39] == 1) {
                    dbcon.query('SELECT * from tb_sensor  WHERE sensor_id = "' + dashMode[39] + '"', function(err, ress, fields) {
                        if (err) {
                            console.log(err);
                            return;
                        } else {
                            dashImg[39] = ress[0].sensor_imgNor;
                            dashUnit[39] = ress[0].sensor_unit;
                        }
                    });
                }
                if (dashStatus[40] == 1) {
                    dbcon.query('SELECT * from tb_sensor  WHERE sensor_id = "' + dashMode[40] + '"', function(err, ress, fields) {
                        if (err) {
                            console.log(err);
                            return;
                        } else {
                            dashImg[40] = ress[0].sensor_imgNor;
                            dashUnit[40] = ress[0].sensor_unit;
                        }
                    });
                }
                // ----------------- control
                dbcon.query('SELECT * FROM tb3_controlstatus WHERE controlstatus_sn = "' + house_master + '"', function(err, result_3, fields) {
                    if (err) {
                        console.log(err);
                        return;
                    } else {
                        controlstatus[1] = result_3[0].controlstatus_1;
                        controlstatus[2] = result_3[0].controlstatus_2;
                        controlstatus[3] = result_3[0].controlstatus_3;
                        controlstatus[4] = result_3[0].controlstatus_4;
                        controlstatus[5] = result_3[0].controlstatus_5;
                        controlstatus[6] = result_3[0].controlstatus_6;
                        controlstatus[7] = result_3[0].controlstatus_7;
                        controlstatus[8] = result_3[0].controlstatus_8;
                        controlstatus[9] = result_3[0].controlstatus_9;
                        controlstatus[10] = result_3[0].controlstatus_10;
                        controlstatus[11] = result_3[0].controlstatus_11;
                        controlstatus[12] = result_3[0].controlstatus_12;
                    }
                    dbcon.query('SELECT * FROM tb3_conttrolname WHERE conttrolname_sn = "' + house_master + '"', function(err, result_, fields) {
                        if (err) {
                            console.log(err);
                            return;
                        } else {
                            conttrolname[1] = result_[0].conttrolname_1;
                            conttrolname[2] = result_[0].conttrolname_2;
                            conttrolname[3] = result_[0].conttrolname_3;
                            conttrolname[4] = result_[0].conttrolname_4;
                            conttrolname[5] = result_[0].conttrolname_5;
                            conttrolname[6] = result_[0].conttrolname_6;
                            conttrolname[7] = result_[0].conttrolname_7;
                            conttrolname[8] = result_[0].conttrolname_8;
                            conttrolname[9] = result_[0].conttrolname_9;
                            conttrolname[10] = result_[0].conttrolname_10;
                            conttrolname[11] = result_[0].conttrolname_11;
                            conttrolname[12] = result_[0].conttrolname_12;
                        }
                    });

                    dbcon.query('SELECT * FROM tb3_controlcanel WHERE controlcanel_sn = "' + house_master + '"', function(err, result_4, fields) {
                        if (err) {
                            console.log(err);
                            return;
                        } else {
                            controlcanel[1] = result_4[0].controlcanel_1;
                            controlcanel[2] = result_4[0].controlcanel_2;
                            controlcanel[3] = result_4[0].controlcanel_3;
                            controlcanel[4] = result_4[0].controlcanel_4;
                            controlcanel[5] = result_4[0].controlcanel_5;
                            controlcanel[6] = result_4[0].controlcanel_6;
                            controlcanel[7] = result_4[0].controlcanel_7;
                            controlcanel[8] = result_4[0].controlcanel_8;
                            controlcanel[9] = result_4[0].controlcanel_9;
                            controlcanel[10] = result_4[0].controlcanel_10;
                            controlcanel[11] = result_4[0].controlcanel_11;
                            controlcanel[12] = result_4[0].controlcanel_12;
                            var drip_1 = [];
                            var drip_2 = [];
                            var drip_3 = [];
                            var drip_4 = [];
                            var drip_5 = [];
                            var drip_6 = [];
                            var drip_7 = [];
                            var drip_8 = [];
                            var foggy = [];
                            var fan = [];
                            var shader = [];
                            var fertilizer = [];
                            // if (controlstatus[1] == 1) {
                            dbcon.query('SELECT * from tb_loard WHERE loard_id = "' + controlcanel[1] + '"', function(err, ress, fields) {
                                if (err) {
                                    console.log(err);
                                    return;
                                } else {
                                    drip_1[0] = ress[0].loard_imgOn;
                                    drip_1[1] = ress[0].loard_imgOff;
                                }
                                console.log(imgCon['drip_1_on'])
                            });
                            // } else { drip_1 = ''; }
                            // if (controlstatus[2] == 1) {
                            dbcon.query('SELECT * from tb_loard WHERE loard_id = "' + controlcanel[2] + '"', function(err, ress, fields) {
                                if (err) {
                                    console.log(err);
                                    return;
                                } else {
                                    drip_2[0] = ress[0].loard_imgOn;
                                    drip_2[1] = ress[0].loard_imgOff;
                                }
                            });
                            // } else { drip_2 = ''; }
                            // if (controlstatus[3] == 1) {
                            dbcon.query('SELECT * from tb_loard WHERE loard_id = "' + controlcanel[3] + '"', function(err, ress, fields) {
                                if (err) {
                                    console.log(err);
                                    return;
                                } else {
                                    drip_3[0] = ress[0].loard_imgOn;
                                    drip_3[1] = ress[0].loard_imgOff;
                                }
                            });
                            // } else { drip_3 = ''; }
                            // if (controlstatus[4] == 1) {
                            dbcon.query('SELECT * from tb_loard WHERE loard_id = "' + controlcanel[4] + '"', function(err, ress, fields) {
                                if (err) {
                                    console.log(err);
                                    return;
                                } else {
                                    drip_4[0] = ress[0].loard_imgOn;
                                    drip_4[1] = ress[0].loard_imgOff;
                                }
                            });
                            // } else { drip_4 = ''; }
                            // if (controlstatus[5] == 1) {
                            dbcon.query('SELECT * from tb_loard WHERE loard_id = "' + controlcanel[5] + '"', function(err, ress, fields) {
                                if (err) {
                                    console.log(err);
                                    return;
                                } else {
                                    drip_5[0] = ress[0].loard_imgOn;
                                    drip_5[1] = ress[0].loard_imgOff;
                                }
                            });
                            // } else { drip_5 = ''; }
                            // if (controlstatus[6] == 1) {
                            dbcon.query('SELECT * from tb_loard WHERE loard_id = "' + controlcanel[6] + '"', function(err, ress, fields) {
                                if (err) {
                                    console.log(err);
                                    return;
                                } else {
                                    drip_6[0] = ress[0].loard_imgOn;
                                    drip_6[1] = ress[0].loard_imgOff;
                                }
                            });
                            // } else { drip_6 = ''; }
                            // if (controlstatus[7] == 1) {
                            dbcon.query('SELECT * from tb_loard WHERE loard_id = "' + controlcanel[7] + '"', function(err, ress, fields) {
                                if (err) {
                                    console.log(err);
                                    return;
                                } else {
                                    drip_7[0] = ress[0].loard_imgOn;
                                    drip_7[1] = ress[0].loard_imgOff;
                                }
                            });
                            // } else { drip_7 = ''; }
                            // if (controlstatus[8] == 1) {
                            dbcon.query('SELECT * from tb_loard WHERE loard_id = "' + controlcanel[8] + '"', function(err, ress, fields) {
                                if (err) {
                                    console.log(err);
                                    return;
                                } else {
                                    drip_8[0] = ress[0].loard_imgOn;
                                    drip_8[1] = ress[0].loard_imgOff;
                                }
                            });
                            // } else { drip_8 = ''; }
                            // if (controlstatus[9] == 1) {
                            dbcon.query('SELECT * from tb_loard WHERE loard_id = "' + controlcanel[9] + '"', function(err, ress, fields) {
                                if (err) {
                                    console.log(err);
                                    return;
                                } else {
                                    foggy[0] = ress[0].loard_imgOn;
                                    foggy[1] = ress[0].loard_imgOff;
                                }
                            });
                            // } else { foggy = ''; }
                            // if (controlstatus[10] == 1) {
                            dbcon.query('SELECT * from tb_loard WHERE loard_id = "' + controlcanel[10] + '"', function(err, ress, fields) {
                                if (err) {
                                    console.log(err);
                                    return;
                                } else {
                                    fan[0] = ress[0].loard_imgOn;
                                    fan[1] = ress[0].loard_imgOff;
                                }
                            });
                            // } else { fan = ''; }
                            // if (controlstatus[11] == 1) {
                            dbcon.query('SELECT * from tb_loard WHERE loard_id = "' + controlcanel[11] + '"', function(err, ress, fields) {
                                if (err) {
                                    console.log(err);
                                    return;
                                } else {
                                    shader[0] = ress[0].loard_imgOn;
                                    shader[1] = ress[0].loard_imgOff;
                                    shader[2] = ress[0].loard_img2;
                                    shader[3] = ress[0].loard_img3;
                                    shader[4] = ress[0].loard_img4;
                                }
                            });
                            // } else { shader = ''; }
                            // if (controlstatus[12] == 1) {
                            dbcon.query('SELECT * from tb_loard WHERE loard_id = "' + controlcanel[12] + '"', function(err, ress, fields) {
                                if (err) {
                                    console.log(err);
                                    return;
                                } else {
                                    fertilizer[0] = ress[0].loard_imgOn;
                                    fertilizer[1] = ress[0].loard_imgOff;
                                }
                                imgCon = {
                                    'drip_1': drip_1,
                                    'drip_2': drip_2,
                                    'drip_3': drip_3,
                                    'drip_4': drip_4,
                                    'drip_5': drip_2,
                                    'drip_6': drip_6,
                                    'drip_7': drip_7,
                                    'drip_8': drip_8,
                                    'foggy': foggy,
                                    'fan': fan,
                                    'shader': shader,
                                    'fertilizer': fertilizer
                                }
                                data_json = {
                                    's_master': s_master,
                                    'dashStatus': dashStatus,
                                    'dashName': dashName,
                                    'dashSncanel': dashSncanel,
                                    'dashMode': dashMode,
                                    'dashImg': dashImg,
                                    'dashUnit': dashUnit,
                                    'controlstatus': controlstatus,
                                    'conttrolname': conttrolname,
                                    'imgCon': imgCon
                                };
                                // console.log(imgCon);
                                res.status(200).json(data_json)
                                res.end();
                            });
                            // } else { fertilizer = ''; }

                        }
                    });
                });
            }
        });
    });
});

module.exports = router;