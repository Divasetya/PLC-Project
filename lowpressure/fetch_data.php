<?php
// Koneksi ke database
include_once "../koneksi.php";

// Inisiasi koneksi
$koneksi = koneksi();

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Query untuk mengambil data
$query = "SELECT 
    SERIAL_No, 
    Temp_Atmosp_Cy_On, 
    Humidity_Cy_On, 
    R_UP_Main_Temp_Cy_On, 
    R_UP_SP_Temp_Cy_On, 
    No_Use_Cy_On1, 
    R_Low_Gat1_Temp_Cy_On, 
    No_Use_Cy_On2, 
    R_Low_Main1_Temp_Cy_On, 
    R_Low_Main2_Temp_Cy_On, 
    R_YUGUCHI_Temp_Cy_On, 
    L_UP_Main_Temp_Cy_On, 
    L_UP_SP_Temp_Cy_On, 
    No_Use_Cy_On3, 
    L_LOW_Gate1_Temp_Cy_On, 
    No_Use_Cy_On4, 
    L_LOW_Main1_Temp_Cy_On, 
    L_LOW_Main2_Temp_Cy_On, 
    L_YUGUCHI_Temp_Cy_On, 
    PRS_C_Temp_Cy_On, 
    HLD_C_Temp_Cy_On, 
    Cool_Wtr_IN_Cy_On, 
    Cool_Air_IN_Cy_On, 
    L_CP_2_Cy_On, 
    L_CP_3_Cy_On, 
    R_UP_SP_Wtr_Flow, 
    R_UP_Wtr_Flow, 
    L_UP_SP_Wtr_Flow, 
    L_UP_Wtr_Flow, 
    R_Low_air_1_Flow, 
    L_Low_air_1_Flow, 
    R_Low_air_2_Flow, 
    L_Low_air_2_Flow, 
    SP6, 
    SP7, 
    Press_Prg_No, 
    After_Request_Shot, 
    Coating_Life_Result, 
    Temp_Atmosp_Process, 
    Humidity_Process, 
    R_UP_Main_Temp_Process, 
    R_UP_SP_Temp_Process, 
    No_Use_Process1, 
    R_Low_Gat1_Temp_Process, 
    No_Use_Process2, 
    R_Low_Main1_Temp_Process, 
    R_Low_Main2_Temp_Process, 
    R_YUGUCHI_Temp_Process, 
    L_UP_Main_Temp_Process, 
    L_UP_SP_Temp_Process, 
    No_Use_Process3, 
    L_LOW_Gate1_Temp_Process, 
    No_Use_Process4, 
    L_LOW_Main1_Temp_Process, 
    L_LOW_Main2_Temp_Process, 
    L_YUGUCHI_Temp_Process, 
    PRS_C_Temp_Process, 
    HLD_C_Temp_Process, 
    Cool_Wtr_IN_Process, 
    Cool_Air_IN_Process, 
    SP8, 
    SP9, 
    SP10, 
    SP11, 
    SP12, 
    SP13, 
    Cycle_Time1, 
    Cycle_Time2, 
    Cycle_Time3, 
    Inspection_OK_or_NG, 
    SP14, 
    SP15, 
    SP16 
FROM dummydata 
ORDER BY timestamp DESC LIMIT 10";

$result = $koneksi->query($query);

$serialNumbers = [];
$tempAtmospCyOn = [];
$humidityCyOn = [];
$rUpMainTempCyOn = [];
$rUpSpTempCyOn = [];
$noUseCyOn1 = [];
$rLowGat1TempCyOn = [];
$noUseCyOn2 = [];
$rLowMain1TempCyOn = [];
$rLowMain2TempCyOn = [];
$rYuguchiTempCyOn = [];
$lUpMainTempCyOn = [];
$lUpSpTempCyOn = [];
$noUseCyOn3 = [];
$lLowGate1TempCyOn = [];
$noUseCyOn4 = [];
$lLowMain1TempCyOn = [];
$lLowMain2TempCyOn = [];
$lYuguchiTempCyOn = [];
$prsCTempCyOn = [];
$hldCTempCyOn = [];
$coolWtrInCyOn = [];
$coolAirInCyOn = [];
$lCp2CyOn = [];
$lCp3CyOn = [];
$rUpSpWtrFlow = [];
$rUpWtrFlow = [];
$lUpSpWtrFlow = [];
$lUpWtrFlow = [];
$rLowAir1Flow = [];
$lLowAir1Flow = [];
$rLowAir2Flow = [];
$lLowAir2Flow = [];
$sp6 = [];
$sp7 = [];
$pressPrgNo = [];
$afterRequestShot = [];
$coatingLifeResult = [];
$tempAtmospProcess = [];
$humidityProcess = [];
$rUpMainTempProcess = [];
$rUpSpTempProcess = [];
$noUseProcess1 = [];
$rLowGat1TempProcess = [];
$noUseProcess2 = [];
$rLowMain1TempProcess = [];
$rLowMain2TempProcess = [];
$rYuguchiTempProcess = [];
$lUpMainTempProcess = [];
$lUpSpTempProcess = [];
$noUseProcess3 = [];
$lLowGate1TempProcess = [];
$noUseProcess4 = [];
$lLowMain1TempProcess = [];
$lLowMain2TempProcess = [];
$lYuguchiTempProcess = [];
$prsCTempProcess = [];
$hldCTempProcess = [];
$coolWtrInProcess = [];
$coolAirInProcess = [];
$sp8 = [];
$sp9 = [];
$sp10 = [];
$sp11 = [];
$sp12 = [];
$sp13 = [];
$cycleTime1 = [];
$cycleTime2 = [];
$cycleTime3 = [];
$inspectionOkOrNg = [];
$sp14 = [];
$sp15 = [];
$sp16 = [];

// Fetch data
while ($row = $result->fetch_assoc()) {
    $serialNumbers[] = $row['SERIAL_No'];
    $tempAtmospCyOn[] = $row['Temp_Atmosp_Cy_On'];
    $humidityCyOn[] = $row['Humidity_Cy_On'];
    $rUpMainTempCyOn[] = $row['R_UP_Main_Temp_Cy_On'];
    $rUpSpTempCyOn[] = $row['R_UP_SP_Temp_Cy_On'];
    $noUseCyOn1[] = $row['No_Use_Cy_On1'];
    $rLowGat1TempCyOn[] = $row['R_Low_Gat1_Temp_Cy_On'];
    $noUseCyOn2[] = $row['No_Use_Cy_On2'];
    $rLowMain1TempCyOn[] = $row['R_Low_Main1_Temp_Cy_On'];
    $rLowMain2TempCyOn[] = $row['R_Low_Main2_Temp_Cy_On'];
    $rYuguchiTempCyOn[] = $row['R_YUGUCHI_Temp_Cy_On'];
    $lUpMainTempCyOn[] = $row['L_UP_Main_Temp_Cy_On'];
    $lUpSpTempCyOn[] = $row['L_UP_SP_Temp_Cy_On'];
    $noUseCyOn3[] = $row['No_Use_Cy_On3'];
    $lLowGate1TempCyOn[] = $row['L_LOW_Gate1_Temp_Cy_On'];
    $noUseCyOn4[] = $row['No_Use_Cy_On4'];
    $lLowMain1TempCyOn[] = $row['L_LOW_Main1_Temp_Cy_On'];
    $lLowMain2TempCyOn[] = $row['L_LOW_Main2_Temp_Cy_On'];
    $lYuguchiTempCyOn[] = $row['L_YUGUCHI_Temp_Cy_On'];
    $prsCTempCyOn[] = $row['PRS_C_Temp_Cy_On'];
    $hldCTempCyOn[] = $row['HLD_C_Temp_Cy_On'];
    $coolWtrInCyOn[] = $row['Cool_Wtr_IN_Cy_On'];
    $coolAirInCyOn[] = $row['Cool_Air_IN_Cy_On'];
    $lCp2CyOn[] = $row['L_CP_2_Cy_On'];
    $lCp3CyOn[] = $row['L_CP_3_Cy_On'];
    $rUpSpWtrFlow[] = $row['R_UP_SP_Wtr_Flow'];
    $rUpWtrFlow[] = $row['R_UP_Wtr_Flow'];
    $lUpSpWtrFlow[] = $row['L_UP_SP_Wtr_Flow'];
    $lUpWtrFlow[] = $row['L_UP_Wtr_Flow'];
    $rLowAir1Flow[] = $row['R_Low_air_1_Flow'];
    $lLowAir1Flow[] = $row['L_Low_air_1_Flow'];
    $rLowAir2Flow[] = $row['R_Low_air_2_Flow'];
    $lLowAir2Flow[] = $row['L_Low_air_2_Flow'];
    $sp6[] = $row['SP6'];
    $sp7[] = $row['SP7'];
    $pressPrgNo[] = $row['Press_Prg_No'];
    $afterRequestShot[] = $row['After_Request_Shot'];
    $coatingLifeResult[] = $row['Coating_Life_Result'];
    $tempAtmospProcess[] = $row['Temp_Atmosp_Process'];
    $humidityProcess[] = $row['Humidity_Process'];
    $rUpMainTempProcess[] = $row['R_UP_Main_Temp_Process'];
    $rUpSpTempProcess[] = $row['R_UP_SP_Temp_Process'];
    $noUseProcess1[] = $row['No_Use_Process1'];
    $rLowGat1TempProcess[] = $row['R_Low_Gat1_Temp_Process'];
    $noUseProcess2[] = $row['No_Use_Process2'];
    $rLowMain1TempProcess[] = $row['R_Low_Main1_Temp_Process'];
    $rLowMain2TempProcess[] = $row['R_Low_Main2_Temp_Process'];
    $rYuguchiTempProcess[] = $row['R_YUGUCHI_Temp_Process'];
    $lUpMainTempProcess[] = $row['L_UP_Main_Temp_Process'];
    $lUpSpTempProcess[] = $row['L_UP_SP_Temp_Process'];
    $noUseProcess3[] = $row['No_Use_Process3'];
    $lLowGate1TempProcess[] = $row['L_LOW_Gate1_Temp_Process'];
    $noUseProcess4[] = $row['No_Use_Process4'];
    $lLowMain1TempProcess[] = $row['L_LOW_Main1_Temp_Process'];
    $lLowMain2TempProcess[] = $row['L_LOW_Main2_Temp_Process'];
    $lYuguchiTempProcess[] = $row['L_YUGUCHI_Temp_Process'];
    $prsCTempProcess[] = $row['PRS_C_Temp_Process'];
    $hldCTempProcess[] = $row['HLD_C_Temp_Process'];
    $coolWtrInProcess[] = $row['Cool_Wtr_IN_Process'];
    $coolAirInProcess[] = $row['Cool_Air_IN_Process'];
    $sp8[] = $row['SP8'];
    $sp9[] = $row['SP9'];
    $sp10[] = $row['SP10'];
    $sp11[] = $row['SP11'];
    $sp12[] = $row['SP12'];
    $sp13[] = $row['SP13'];
    $cycleTime1[] = $row['Cycle_Time1'];
    $cycleTime2[] = $row['Cycle_Time2'];
    $cycleTime3[] = $row['Cycle_Time3'];
    $inspectionOkOrNg[] = $row['Inspection_OK_or_NG'];
    $sp14[] = $row['SP14'];
    $sp15[] = $row['SP15'];
    $sp16[] = $row['SP16'];
}

// Tutup koneksi
$koneksi->close();
?>
