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
        id,
        SERIAL_No,
        Time_Year,
        Time_Month,
        Time_Day,
        Time_Hour,
        Time_Min,
        Shift,
        MC_No,
        Die_No,
        Operator_ID,
        Corting_ID,
        Temp_Atmosphere_Cycle_Start,
        Humidity_Cycle_Start,
        R_Upper1_Temp_Cycle_Start,
        R_Upper2_Temp_Cycle_Start,
        No_Use_Cycle_Start_1,
        R_Lower_Gate1_Temp_Cycle_Start,
        No_Use_Cycle_Start_2,
        R_Lower_Main1_Temp_Cycle_Start,
        R_Lower_Main2_Temp_Cycle_Start,
        R_Yuguchi_Temp_Cycle_Start,
        L_UppeL_Main_Temp_Cycle_Start,
        L_UppeL_SP_Temp_Cycle_Start,
        No_Use_Cycle_Start_3,
        L_LoweL_Gate1_Temp_Cycle_Start,
        No_Use_Cycle_Start_4,
        L_LoweL_Main1_Temp_Cycle_Start,
        L_LoweL_Main2_Temp_Cycle_Start,
        L_Yuguchi_Temp_Cycle_Start,
        PRS_C_Temp_Cycle_Start,
        HLD_C_Temp_Cycle_Start,
        Cooling_Water_IN_Cycle_Start,
        Cooling_Air_IN_Cycle_Start,
        R_Center_Pin1_Cycle_Start,
        R_Center_Pin2_Cycle_Start,
        R_Center_Pin3_Cycle_Start,
        L_Center_Pin1_Cycle_Start,
        L_Center_Pin2_Cycle_Start,
        L_Center_Pin3_Cycle_Start,
        R_Upper_SP_Water_Flow,
        R_Upper_Water_Flow,
        L_Upper_SP_Water_Flow,
        L_Upper_Water_Flow,
        R_Lower_Air1_Flow,
        L_Lower_Air1_Flow,
        R_Lower_Air2_Flow,
        L_Lower_Air2_Flow,
        SP6,
        SP7,
        Press_Prg_No,
        After_Request_Shot,
        Coating_Life_Result,
        Temp_Atmosphere,
        Humidity,
        R_Upper_Main_Temp_HLD_Comp_Temp,
        R_Upper_SP_Temp_HLD_Comp_Temp,
        No_Use_HLD_Comp_Temp_1,
        R_Lower_Gate1_Temp_HLD_Comp_Temp,
        No_Use_HLD_Comp_Temp_2,
        R_Lower_Main1_Temp_HLD_Comp_Temp,
        R_Lower_Main2_Temp_HLD_Comp_Temp,
        R_Yuguchi_Temp_HLD_Comp_Temp,
        L_UppeL_Main_Temp_HLD_Comp_Temp,
        L_UppeL_SP_Temp_HLD_Comp_Temp,
        No_Use_HLD_Comp_Temp_3,
        L_LoweL_Gate1_Temp_HLD_Comp_Temp,
        No_Use_HLD_Comp_Temp_4,
        L_LoweL_Main1_Temp_HLD_Comp_Temp,
        L_LoweL_Main2_Temp_HLD_Comp_Temp,
        L_Yuguchi_Temp_HLD_Comp_Temp,
        PRS_C_Temp_HLD_Comp_Temp,
        HLD_C_Temp_HLD_Comp_Temp,
        Cooling_Water_IN_HLD_Comp_Temp,
        Cooling_Air_IN_HLD_Comp_Temp,
        SP8,
        SP10,
        SP12,
        SP13,
        Cycle_Time1,
        Cycle_Time2,
        Cycle_Time3,
        Inspection_OK_or_NG,
        SP15,
        SP16,
        SP17,
        SP19,
        SP20
    FROM datasensor 
    ORDER BY id DESC LIMIT 10";

    $result = $koneksi->query($query);

    $serialNumbers = [];
    $timeYear = [];
    $timeMonth = [];
    $timeDay = [];
    $timeHour = [];
    $timeMin = [];
    $shift = [];
    $mcNo = [];
    $dieNo = [];
    $operatorId = [];
    $cortingId = [];
    $tempAtmosphereCycleStart = [];
    $humidityCycleStart = [];
    $rUpper1TempCycleStart = [];
    $rUpper2TempCycleStart = [];
    $noUseCycleStart1 = [];
    $rLowerGate1TempCycleStart = [];
    $noUseCycleStart2 = [];
    $rLowerMain1TempCycleStart = [];
    $rLowerMain2TempCycleStart = [];
    $rYuguchiTempCycleStart = [];
    $lUpperMainTempCycleStart = [];
    $lUpperSPTempCycleStart = [];
    $noUseCycleStart3 = [];
    $lLowerGate1TempCycleStart = [];
    $noUseCycleStart4 = [];
    $lLowerMain1TempCycleStart = [];
    $lLowerMain2TempCycleStart = [];
    $lYuguchiTempCycleStart = [];
    $prsCTempCycleStart = [];
    $hldCTempCycleStart = [];
    $coolingWaterInCycleStart = [];
    $coolingAirInCycleStart = [];
    $rCenterPin1CycleStart = [];
    $rCenterPin2CycleStart = [];
    $rCenterPin3CycleStart = [];
    $lCenterPin1CycleStart = [];
    $lCenterPin2CycleStart = [];
    $lCenterPin3CycleStart = [];
    $rUpperSPWaterFlow = [];
    $rUpperWaterFlow = [];
    $lUpperSPWaterFlow = [];
    $lUpperWaterFlow = [];
    $rLowerAir1Flow = [];
    $lLowerAir1Flow = [];
    $rLowerAir2Flow = [];
    $lLowerAir2Flow = [];
    $sp6 = [];
    $sp7 = [];
    $pressPrgNo = [];
    $afterRequestShot = [];
    $coatingLifeResult = [];
    $tempAtmosphere = [];
    $humidity = [];
    $rUpperMainTempHldCompTemp = [];
    $rUpperSPTempHldCompTemp = [];
    $noUseHldCompTemp1 = [];
    $rLowerGate1TempHldCompTemp = [];
    $noUseHldCompTemp2 = [];
    $rLowerMain1TempHldCompTemp = [];
    $rLowerMain2TempHldCompTemp = [];
    $rYuguchiTempHldCompTemp = [];
    $lUpperMainTempHldCompTemp = [];
    $lUpperSPTempHldCompTemp = [];
    $noUseHldCompTemp3 = [];
    $lLowerGate1TempHldCompTemp = [];
    $noUseHldCompTemp4 = [];
    $lLowerMain1TempHldCompTemp = [];
    $lLowerMain2TempHldCompTemp = [];
    $lYuguchiTempHldCompTemp = [];
    $prsCTempHldCompTemp = [];
    $hldCTempHldCompTemp = [];
    $coolingWaterInHldCompTemp = [];
    $coolingAirInHldCompTemp = [];
    $sp8 = [];
    $sp10 = [];
    $sp12 = [];
    $sp13 = [];
    $cycleTime1 = [];
    $cycleTime2 = [];
    $cycleTime3 = [];
    $inspectionOkOrNg = [];
    $sp15 = [];
    $sp16 = [];
    $sp17 = [];
    $sp19 = [];
    $sp20 = [];

    // Fetch data
    while ($row = $result->fetch_assoc()) {
        $serialNumbers[] = $row['SERIAL_No'];
        $timeYear[] = $row['Time_Year'];
        $timeMonth[] = $row['Time_Month'];
        $timeDay[] = $row['Time_Day'];
        $timeHour[] = $row['Time_Hour'];
        $timeMin[] = $row['Time_Min'];
        $shift[] = $row['Shift'];
        $mcNo[] = $row['MC_No'];
        $dieNo[] = $row['Die_No'];
        $operatorId[] = $row['Operator_ID'];
        $cortingId[] = $row['Corting_ID'];
        $tempAtmosphereCycleStart[] = $row['Temp_Atmosphere_Cycle_Start'];
        $humidityCycleStart[] = $row['Humidity_Cycle_Start'];
        $rUpper1TempCycleStart[] = $row['R_Upper1_Temp_Cycle_Start'];
        $rUpper2TempCycleStart[] = $row['R_Upper2_Temp_Cycle_Start'];
        $noUseCycleStart1[] = $row['No_Use_Cycle_Start_1'];
        $rLowerGate1TempCycleStart[] = $row['R_Lower_Gate1_Temp_Cycle_Start'];
        $noUseCycleStart2[] = $row['No_Use_Cycle_Start_2'];
        $rLowerMain1TempCycleStart[] = $row['R_Lower_Main1_Temp_Cycle_Start'];
        $rLowerMain2TempCycleStart[] = $row['R_Lower_Main2_Temp_Cycle_Start'];
        $rYuguchiTempCycleStart[] = $row['R_Yuguchi_Temp_Cycle_Start'];
        $lUpperMainTempCycleStart[] = $row['L_UppeL_Main_Temp_Cycle_Start'];
        $lUpperSPTempCycleStart[] = $row['L_UppeL_SP_Temp_Cycle_Start'];
        $noUseCycleStart3[] = $row['No_Use_Cycle_Start_3'];
        $lLowerGate1TempCycleStart[] = $row['L_LoweL_Gate1_Temp_Cycle_Start'];
        $noUseCycleStart4[] = $row['No_Use_Cycle_Start_4'];
        $lLowerMain1TempCycleStart[] = $row['L_LoweL_Main1_Temp_Cycle_Start'];
        $lLowerMain2TempCycleStart[] = $row['L_LoweL_Main2_Temp_Cycle_Start'];
        $lYuguchiTempCycleStart[] = $row['L_Yuguchi_Temp_Cycle_Start'];
        $prsCTempCycleStart[] = $row['PRS_C_Temp_Cycle_Start'];
        $hldCTempCycleStart[] = $row['HLD_C_Temp_Cycle_Start'];
        $coolingWaterInCycleStart[] = $row['Cooling_Water_IN_Cycle_Start'];
        $coolingAirInCycleStart[] = $row['Cooling_Air_IN_Cycle_Start'];
        $rCenterPin1CycleStart[] = $row['R_Center_Pin1_Cycle_Start'];
        $rCenterPin2CycleStart[] = $row['R_Center_Pin2_Cycle_Start'];
        $rCenterPin3CycleStart[] = $row['R_Center_Pin3_Cycle_Start'];
        $lCenterPin1CycleStart[] = $row['L_Center_Pin1_Cycle_Start'];
        $lCenterPin2CycleStart[] = $row['L_Center_Pin2_Cycle_Start'];
        $lCenterPin3CycleStart[] = $row['L_Center_Pin3_Cycle_Start'];
        $rUpperSPWaterFlow[] = $row['R_Upper_SP_Water_Flow'];
        $rUpperWaterFlow[] = $row['R_Upper_Water_Flow'];
        $lUpperSPWaterFlow[] = $row['L_Upper_SP_Water_Flow'];
        $lUpperWaterFlow[] = $row['L_Upper_Water_Flow'];
        $rLowerAir1Flow[] = $row['R_Lower_Air1_Flow'];
        $lLowerAir1Flow[] = $row['L_Lower_Air1_Flow'];
        $rLowerAir2Flow[] = $row['R_Lower_Air2_Flow'];
        $lLowerAir2Flow[] = $row['L_Lower_Air2_Flow'];
        $sp6[] = $row['SP6'];
        $sp7[] = $row['SP7'];
        $pressPrgNo[] = $row['Press_Prg_No'];
        $afterRequestShot[] = $row['After_Request_Shot'];
        $coatingLifeResult[] = $row['Coating_Life_Result'];
        $tempAtmosphere[] = $row['Temp_Atmosphere'];
        $humidity[] = $row['Humidity'];
        $rUpperMainTempHldCompTemp[] = $row['R_Upper_Main_Temp_HLD_Comp_Temp'];
        $rUpperSPTempHldCompTemp[] = $row['R_Upper_SP_Temp_HLD_Comp_Temp'];
        $noUseHldCompTemp1[] = $row['No_Use_HLD_Comp_Temp_1'];
        $rLowerGate1TempHldCompTemp[] = $row['R_Lower_Gate1_Temp_HLD_Comp_Temp'];
        $noUseHldCompTemp2[] = $row['No_Use_HLD_Comp_Temp_2'];
        $rLowerMain1TempHldCompTemp[] = $row['R_Lower_Main1_Temp_HLD_Comp_Temp'];
        $rLowerMain2TempHldCompTemp[] = $row['R_Lower_Main2_Temp_HLD_Comp_Temp'];
        $rYuguchiTempHldCompTemp[] = $row['R_Yuguchi_Temp_HLD_Comp_Temp'];
        $lUpperMainTempHldCompTemp[] = $row['L_UppeL_Main_Temp_HLD_Comp_Temp'];
        $lUpperSPTempHldCompTemp[] = $row['L_UppeL_SP_Temp_HLD_Comp_Temp'];
        $noUseHldCompTemp3[] = $row['No_Use_HLD_Comp_Temp_3'];
        $lLowerGate1TempHldCompTemp[] = $row['L_LoweL_Gate1_Temp_HLD_Comp_Temp'];
        $noUseHldCompTemp4[] = $row['No_Use_HLD_Comp_Temp_4'];
        $lLowerMain1TempHldCompTemp[] = $row['L_LoweL_Main1_Temp_HLD_Comp_Temp'];
        $lLowerMain2TempHldCompTemp[] = $row['L_LoweL_Main2_Temp_HLD_Comp_Temp'];
        $lYuguchiTempHldCompTemp[] = $row['L_Yuguchi_Temp_HLD_Comp_Temp'];
        $prsCTempHldCompTemp[] = $row['PRS_C_Temp_HLD_Comp_Temp'];
        $hldCTempHldCompTemp[] = $row['HLD_C_Temp_HLD_Comp_Temp'];
        $coolingWaterInHldCompTemp[] = $row['Cooling_Water_IN_HLD_Comp_Temp'];
        $coolingAirInHldCompTemp[] = $row['Cooling_Air_IN_HLD_Comp_Temp'];
        $sp8[] = $row['SP8'];
        $sp10[] = $row['SP10'];
        $sp12[] = $row['SP12'];
        $sp13[] = $row['SP13'];
        $cycleTime1[] = $row['Cycle_Time1'];
        $cycleTime2[] = $row['Cycle_Time2'];
        $cycleTime3[] = $row['Cycle_Time3'];
        $inspectionOkOrNg[] = $row['Inspection_OK_or_NG'];
        $sp15[] = $row['SP15'];
        $sp16[] = $row['SP16'];
        $sp17[] = $row['SP17'];
        $sp19[] = $row['SP19'];
        $sp20[] = $row['SP20'];
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