<?php
    // Koneksi ke database
    include_once "databaseconn.php";

    // Inisiasi koneksi
    $koneksi = getConnection();

    // Cek koneksi
    if ($koneksi->connect_error) {
        die("Koneksi gagal: " . $koneksi->connect_error);
    }

    // Query untuk mengambil data
    $query = "SELECT 
        `id`,
        `SERIAL_No`,
        `SP1`,
        `SP2`,
        `SP3`,
        `SP4`,
        `SP5`,
        `Time_Year`,
        `Time_Month`,
        `Time_Day`,
        `Time_Hour`,
        `Time_Min`,
        `Shift`,
        `MC_No`,
        `Die_No`,
        `Operator_ID`,
        `Corting_ID`,
        `Temp_atmosphere_Cycle_Start`,
        `Humidity_Cycle_Start`,
        `R_UPPER_DIE_IN_1`,
        `R_UPPER_DIE_RE`,
        `R_UPPER_DIE_FR_1`,
        `R_LOWER_DIE_IN`,
        `R_LOWER_DIE_FR_1`,
        `R_LOWER_DIE_RE_1`,
        `R_LOWER_DIE_GATE_1`,
        `R_YUGUCHI_1`,
        `L_UPPER_DIE_IN_1`,
        `L_UPPER_DIE_RE`,
        `L_UPPER_DIE_FR_1`,
        `L_LOWER_DIE_IN`,
        `L_LOWER_DIE_FR_1`,
        `L_LOWER_DIE_RE_1`,
        `L_LOWER_DIE_GATE_1`,
        `L_YUGUCHI_1`,
        `PRS_C_Temp_Cycle_Start`,
        `HLD_C_Temp_Cycle_Start`,
        `Cooling_Water_IN_Cycle_Start`,
        `Cooling_Air_IN_Cycle_Start`,
        `R_Center_pin_1_Cycle_Start`,
        `R_Center_pin_2_Cycle_Start`,
        `R_Center_pin_3_Cycle_Start`,
        `L_Center_pin_1_Cycle_Start`,
        `L_Center_pin_2_Cycle_Start`,
        `L_Center_pin_3_Cycle_Start`,
        `R_SP_Water_Flow_Detik_4`,
        `R_Upper_Water_MB`,
        `R_SP_Water_Flow_Detik_40`,
        `R_SP_Water_Flow_Detik_50_Stabil`,
        `L_Eject`,
        `R_Lower_WATER_CHAMBER`,
        `R_Lower_air_1_Flow`,
        `R_Lower_air_2_Flow`,
        `L_SP_Water_Flow_Detik_4`,
        `L_Upper_Water_MB`,
        `Press_Prg_No`,
        `After_Request_Shot`,
        `Coating_Life_Result`,
        `Temp_atmosphere`,
        `Humidity`,
        `R_UPPER_DIE_IN_2`,
        `R_UPPER_DIE_EX_RE`,
        `R_UPPER_DIE_FR_2`,
        `R_LOWER_DIE_CENTER_IN`,
        `R_LOWER_DIE_FR_2`,
        `R_LOWER_DIE_RE_2`,
        `R_LOWER_DIE_GATE_2`,
        `R_YUGUCHI_2`,
        `L_UPPER_DIE_IN_2`,
        `L_UPPER_DIE_EX_RE`,
        `L_UPPER_DIE_FR_2`,
        `L_LOWER_DIE_CENTER_IN`,
        `L_LOWER_DIE_FR_2`,
        `L_LOWER_DIE_RE_2`,
        `L_LOWER_DIE_GATE_2`,
        `L_YUGUCHI_2`,
        `PRS_C_Temp_HLD_Comp_Temp`,
        `HLD_C_Temp_HLD_Comp_Temp`,
        `Cooling_Water_IN_HLD_Comp_Temp`,
        `Cooling_Air_IN_HLD_Comp_Temp`,
        `L_Die_close_check_SP`,
        `SP6`,
        `R_Die_close_check_SP`,
        `SP7`,
        `R_Lower_air_3_Flow`,
        `L_Lower_air_3_Flow`,
        `Cycle_Time_1`,
        `Cycle_Time_2`,
        `Cycle_Time_3`,
        `Inspection_OK_or_NG`,
        `SP8`,
        `L_SP_Water_Flow_Detik_40`,
        `L_SP_Water_Flow_Detik_50_Stabil`,
        `R_Eject`,
        `L_Lower_WATER_CHAMBER`,
        `L_Lower_air_1_Flow`,
        `L_Lower_air_2_Flow`
    FROM datasensor 
    ORDER BY id DESC LIMIT 10";

    $result = $koneksi->query($query);

    $SERIAL_No = [];
    $SP1 = [];
    $SP2 = [];
    $SP3 = [];
    $SP4 = [];
    $SP5 = [];
    $Time_Year = [];
    $Time_Month = [];
    $Time_Day = [];
    $Time_Hour = [];
    $Time_Min = [];
    $Shift = [];
    $MC_No = [];
    $Die_No = [];
    $Operator_ID = [];
    $Corting_ID = [];
    $Temp_atmosphere_Cycle_Start = [];
    $Humidity_Cycle_Start = [];
    $R_UPPER_DIE_IN_1 = [];
    $R_UPPER_DIE_RE = [];
    $R_UPPER_DIE_FR_1 = [];
    $R_LOWER_DIE_IN = [];
    $R_LOWER_DIE_FR_1 = [];
    $R_LOWER_DIE_RE_1 = [];
    $R_LOWER_DIE_GATE_1 = [];
    $R_YUGUCHI_1 = [];
    $L_UPPER_DIE_IN_1 = [];
    $L_UPPER_DIE_RE = [];
    $L_UPPER_DIE_FR_1 = [];
    $L_LOWER_DIE_IN = [];
    $L_LOWER_DIE_FR_1 = [];
    $L_LOWER_DIE_RE_1 = [];
    $L_LOWER_DIE_GATE_1 = [];
    $L_YUGUCHI_1 = [];
    $PRS_C_Temp_Cycle_Start = [];
    $HLD_C_Temp_Cycle_Start = [];
    $Cooling_Water_IN_Cycle_Start = [];
    $Cooling_Air_IN_Cycle_Start = [];
    $R_Center_pin_1_Cycle_Start = [];
    $R_Center_pin_2_Cycle_Start = [];
    $R_Center_pin_3_Cycle_Start = [];
    $L_Center_pin_1_Cycle_Start = [];
    $L_Center_pin_2_Cycle_Start = [];
    $L_Center_pin_3_Cycle_Start = [];
    $R_SP_Water_Flow_Detik_4 = [];
    $R_Upper_Water_MB = [];
    $R_SP_Water_Flow_Detik_40 = [];
    $R_SP_Water_Flow_Detik_50_Stabil = [];
    $L_Eject = [];
    $R_Lower_WATER_CHAMBER = [];
    $R_Lower_air_1_Flow = [];
    $R_Lower_air_2_Flow = [];
    $L_SP_Water_Flow_Detik_4 = [];
    $L_Upper_Water_MB = [];
    $Press_Prg_No = [];
    $After_Request_Shot = [];
    $Coating_Life_Result = [];
    $Temp_atmosphere = [];
    $Humidity = [];
    $R_UPPER_DIE_IN_2 = [];
    $R_UPPER_DIE_EX_RE = [];
    $R_UPPER_DIE_FR_2 = [];
    $R_LOWER_DIE_CENTER_IN = [];
    $R_LOWER_DIE_FR_2 = [];
    $R_LOWER_DIE_RE_2 = [];
    $R_LOWER_DIE_GATE_2 = [];
    $R_YUGUCHI_2 = [];
    $L_UPPER_DIE_IN_2 = [];
    $L_UPPER_DIE_EX_RE = [];
    $L_UPPER_DIE_FR_2 = [];
    $L_LOWER_DIE_CENTER_IN = [];
    $L_LOWER_DIE_FR_2 = [];
    $L_LOWER_DIE_RE_2 = [];
    $L_LOWER_DIE_GATE_2 = [];
    $L_YUGUCHI_2 = [];
    $PRS_C_Temp_HLD_Comp_Temp = [];
    $HLD_C_Temp_HLD_Comp_Temp = [];
    $Cooling_Water_IN_HLD_Comp_Temp = [];
    $Cooling_Air_IN_HLD_Comp_Temp = [];
    $L_Die_close_check_SP = [];
    $SP6 = [];
    $R_Die_close_check_SP = [];
    $SP7 = [];
    $R_Lower_air_3_Flow = [];
    $L_Lower_air_3_Flow = [];
    $Cycle_Time_1 = [];
    $Cycle_Time_2 = [];
    $Cycle_Time_3 = [];
    $Inspection_OK_or_NG = [];
    $SP8 = [];
    $L_SP_Water_Flow_Detik_40 = [];
    $L_SP_Water_Flow_Detik_50_Stabil = [];
    $R_Eject = [];
    $L_Lower_WATER_CHAMBER = [];
    $L_Lower_air_1_Flow = [];
    $L_Lower_air_2_Flow = [];

    // Fetch data
    while ($row = $result->fetch_assoc()) {
        $SERIAL_No[] = $row['SERIAL_No'];
        $SP1[] = $row['SP1'];
        $SP2[] = $row['SP2'];
        $SP3[] = $row['SP3'];
        $SP4[] = $row['SP4'];
        $SP5[] = $row['SP5'];
        $Time_Year[] = $row['Time_Year'];
        $Time_Month[] = $row['Time_Month'];
        $Time_Day[] = $row['Time_Day'];
        $Time_Hour[] = $row['Time_Hour'];
        $Time_Min[] = $row['Time_Min'];
        $Shift[] = $row['Shift'];
        $MC_No[] = $row['MC_No'];
        $Die_No[] = $row['Die_No'];
        $Operator_ID[] = $row['Operator_ID'];
        $Corting_ID[] = $row['Corting_ID'];
        $Temp_atmosphere_Cycle_Start[] = $row['Temp_atmosphere_Cycle_Start'];
        $Humidity_Cycle_Start[] = $row['Humidity_Cycle_Start'];
        $R_UPPER_DIE_IN_1[] = $row['R_UPPER_DIE_IN_1'];
        $R_UPPER_DIE_RE[] = $row['R_UPPER_DIE_RE'];
        $R_UPPER_DIE_FR_1[] = $row['R_UPPER_DIE_FR_1'];
        $R_LOWER_DIE_IN[] = $row['R_LOWER_DIE_IN'];
        $R_LOWER_DIE_FR_1[] = $row['R_LOWER_DIE_FR_1'];
        $R_LOWER_DIE_RE_1[] = $row['R_LOWER_DIE_RE_1'];
        $R_LOWER_DIE_GATE_1[] = $row['R_LOWER_DIE_GATE_1'];
        $R_YUGUCHI_1[] = $row['R_YUGUCHI_1'];
        $L_UPPER_DIE_IN_1[] = $row['L_UPPER_DIE_IN_1'];
        $L_UPPER_DIE_RE[] = $row['L_UPPER_DIE_RE'];
        $L_UPPER_DIE_FR_1[] = $row['L_UPPER_DIE_FR_1'];
        $L_LOWER_DIE_IN[] = $row['L_LOWER_DIE_IN'];
        $L_LOWER_DIE_FR_1[] = $row['L_LOWER_DIE_FR_1'];
        $L_LOWER_DIE_RE_1[] = $row['L_LOWER_DIE_RE_1'];
        $L_LOWER_DIE_GATE_1[] = $row['L_LOWER_DIE_GATE_1'];
        $L_YUGUCHI_1[] = $row['L_YUGUCHI_1'];
        $PRS_C_Temp_Cycle_Start[] = $row['PRS_C_Temp_Cycle_Start'];
        $HLD_C_Temp_Cycle_Start[] = $row['HLD_C_Temp_Cycle_Start'];
        $Cooling_Water_IN_Cycle_Start[] = $row['Cooling_Water_IN_Cycle_Start'];
        $Cooling_Air_IN_Cycle_Start[] = $row['Cooling_Air_IN_Cycle_Start'];
        $R_Center_pin_1_Cycle_Start[] = $row['R_Center_pin_1_Cycle_Start'];
        $R_Center_pin_2_Cycle_Start[] = $row['R_Center_pin_2_Cycle_Start'];
        $R_Center_pin_3_Cycle_Start[] = $row['R_Center_pin_3_Cycle_Start'];
        $L_Center_pin_1_Cycle_Start[] = $row['L_Center_pin_1_Cycle_Start'];
        $L_Center_pin_2_Cycle_Start[] = $row['L_Center_pin_2_Cycle_Start'];
        $L_Center_pin_3_Cycle_Start[] = $row['L_Center_pin_3_Cycle_Start'];
        $R_SP_Water_Flow_Detik_4[] = $row['R_SP_Water_Flow_Detik_4'];
        $R_Upper_Water_MB[] = $row['R_Upper_Water_MB'];
        $R_SP_Water_Flow_Detik_40[] = $row['R_SP_Water_Flow_Detik_40'];
        $R_SP_Water_Flow_Detik_50_Stabil[] = $row['R_SP_Water_Flow_Detik_50_Stabil'];
        $L_Eject[] = $row['L_Eject'];
        $R_Lower_WATER_CHAMBER[] = $row['R_Lower_WATER_CHAMBER'];
        $R_Lower_air_1_Flow[] = $row['R_Lower_air_1_Flow'];
        $R_Lower_air_2_Flow[] = $row['R_Lower_air_2_Flow'];
        $L_SP_Water_Flow_Detik_4[] = $row['L_SP_Water_Flow_Detik_4'];
        $L_Upper_Water_MB[] = $row['L_Upper_Water_MB'];
        $Press_Prg_No[] = $row['Press_Prg_No'];
        $After_Request_Shot[] = $row['After_Request_Shot'];
        $Coating_Life_Result[] = $row['Coating_Life_Result'];
        $Temp_atmosphere[] = $row['Temp_atmosphere'];
        $Humidity[] = $row['Humidity'];
        $R_UPPER_DIE_IN_2[] = $row['R_UPPER_DIE_IN_2'];
        $R_UPPER_DIE_EX_RE[] = $row['R_UPPER_DIE_EX_RE'];
        $R_UPPER_DIE_FR_2[] = $row['R_UPPER_DIE_FR_2'];
        $R_LOWER_DIE_CENTER_IN[] = $row['R_LOWER_DIE_CENTER_IN'];
        $R_LOWER_DIE_FR_2[] = $row['R_LOWER_DIE_FR_2'];
        $R_LOWER_DIE_RE_2[] = $row['R_LOWER_DIE_RE_2'];
        $R_LOWER_DIE_GATE_2[] = $row['R_LOWER_DIE_GATE_2'];
        $R_YUGUCHI_2[] = $row['R_YUGUCHI_2'];
        $L_UPPER_DIE_IN_2[] = $row['L_UPPER_DIE_IN_2'];
        $L_UPPER_DIE_EX_RE[] = $row['L_UPPER_DIE_EX_RE'];
        $L_UPPER_DIE_FR_2[] = $row['L_UPPER_DIE_FR_2'];
        $L_LOWER_DIE_CENTER_IN[] = $row['L_LOWER_DIE_CENTER_IN'];
        $L_LOWER_DIE_FR_2[] = $row['L_LOWER_DIE_FR_2'];
        $L_LOWER_DIE_RE_2[] = $row['L_LOWER_DIE_RE_2'];
        $L_LOWER_DIE_GATE_2[] = $row['L_LOWER_DIE_GATE_2'];
        $L_YUGUCHI_2[] = $row['L_YUGUCHI_2'];
        $PRS_C_Temp_HLD_Comp_Temp[] = $row['PRS_C_Temp_HLD_Comp_Temp'];
        $HLD_C_Temp_HLD_Comp_Temp[] = $row['HLD_C_Temp_HLD_Comp_Temp'];
        $Cooling_Water_IN_HLD_Comp_Temp[] = $row['Cooling_Water_IN_HLD_Comp_Temp'];
        $Cooling_Air_IN_HLD_Comp_Temp[] = $row['Cooling_Air_IN_HLD_Comp_Temp'];
        $L_Die_close_check_SP[] = $row['L_Die_close_check_SP'];
        $SP6[] = $row['SP6'];
        $R_Die_close_check_SP[] = $row['R_Die_close_check_SP'];
        $SP7[] = $row['SP7'];
        $R_Lower_air_3_Flow[] = $row['R_Lower_air_3_Flow'];
        $L_Lower_air_3_Flow[] = $row['L_Lower_air_3_Flow'];
        $Cycle_Time_1[] = $row['Cycle_Time_1'];
        $Cycle_Time_2[] = $row['Cycle_Time_2'];
        $Cycle_Time_3[] = $row['Cycle_Time_3'];
        $Inspection_OK_or_NG[] = $row['Inspection_OK_or_NG'];
        $SP8[] = $row['SP8'];
        $L_SP_Water_Flow_Detik_40[] = $row['L_SP_Water_Flow_Detik_40'];
        $L_SP_Water_Flow_Detik_50_Stabil[] = $row['L_SP_Water_Flow_Detik_50_Stabil'];
        $R_Eject[] = $row['R_Eject'];
        $L_Lower_WATER_CHAMBER[] = $row['L_Lower_WATER_CHAMBER'];
        $L_Lower_air_1_Flow[] = $row['L_Lower_air_1_Flow'];
        $L_Lower_air_2_Flow[] = $row['L_Lower_air_2_Flow'];
    }    
    

    // Tutup koneksi
    $koneksi->close();

    // Output JSON for JavaScript
    // echo json_encode([
    //     "labels" => $serialNumbers,
    //     "rLowMain1TempCyOn" => $rLowMain1TempCyOn,
    //     "lLowMain1TempCyOn" => $lLowMain1TempCyOn,
    // ]);
?>