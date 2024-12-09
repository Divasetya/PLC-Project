<?php
// Koneksi ke database
$servername = "localhost";
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$dbname = "dataharvesting"; // Ganti dengan nama database Anda

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil semua data dari tabel
$query = "SELECT `id`, `SERIAL_No`, `Time_Year`, `Time_Month`, `Time_Day`, `Time_Hour`, `Time_Min`, `Shift`, `MC_No`, `Die_No`, `Operator_ID`, `Corting_ID`, 
    `Temp_Atmosphere_Cycle_Start`, `Humidity_Cycle_Start`, `R_Upper1_Temp_Cycle_Start`, `R_Upper2_Temp_Cycle_Start`, `No_Use_Cycle_Start_1`, 
    `R_Lower_Gate1_Temp_Cycle_Start`, `No_Use_Cycle_Start_2`, `R_Lower_Main1_Temp_Cycle_Start`, `R_Lower_Main2_Temp_Cycle_Start`, `R_Yuguchi_Temp_Cycle_Start`, 
    `L_UppeL_Main_Temp_Cycle_Start`, `L_UppeL_SP_Temp_Cycle_Start`, `No_Use_Cycle_Start_3`, `L_LoweL_Gate1_Temp_Cycle_Start`, `No_Use_Cycle_Start_4`, 
    `L_LoweL_Main1_Temp_Cycle_Start`, `L_LoweL_Main2_Temp_Cycle_Start`, `L_Yuguchi_Temp_Cycle_Start`, `PRS_C_Temp_Cycle_Start`, `HLD_C_Temp_Cycle_Start`, 
    `Cooling_Water_IN_Cycle_Start`, `Cooling_Air_IN_Cycle_Start`, `R_Center_Pin1_Cycle_Start`, `R_Center_Pin2_Cycle_Start`, `R_Center_Pin3_Cycle_Start`, 
    `L_Center_Pin1_Cycle_Start`, `L_Center_Pin2_Cycle_Start`, `L_Center_Pin3_Cycle_Start`, `R_Upper_SP_Water_Flow`, `R_Upper_Water_Flow`, 
    `L_Upper_SP_Water_Flow`, `L_Upper_Water_Flow`, `R_Lower_Air1_Flow`, `L_Lower_Air1_Flow`, `R_Lower_Air2_Flow`, `L_Lower_Air2_Flow`, `SP6`, `SP7`, `Press_Prg_No`, 
    `After_Request_Shot`, `Coating_Life_Result`, `Temp_Atmosphere`, `Humidity`, `R_Upper_Main_Temp_HLD_Comp_Temp`, `R_Upper_SP_Temp_HLD_Comp_Temp`, 
    `No_Use_HLD_Comp_Temp_1`, `R_Lower_Gate1_Temp_HLD_Comp_Temp`, `No_Use_HLD_Comp_Temp_2`, `R_Lower_Main1_Temp_HLD_Comp_Temp`, `R_Lower_Main2_Temp_HLD_Comp_Temp`, 
    `R_Yuguchi_Temp_HLD_Comp_Temp`, `L_UppeL_Main_Temp_HLD_Comp_Temp`, `L_UppeL_SP_Temp_HLD_Comp_Temp`, `No_Use_HLD_Comp_Temp_3`, 
    `L_LoweL_Gate1_Temp_HLD_Comp_Temp`, `No_Use_HLD_Comp_Temp_4`, `L_LoweL_Main1_Temp_HLD_Comp_Temp`, `L_LoweL_Main2_Temp_HLD_Comp_Temp`, 
    `L_Yuguchi_Temp_HLD_Comp_Temp`, `PRS_C_Temp_HLD_Comp_Temp`, `HLD_C_Temp_HLD_Comp_Temp`, `Cooling_Water_IN_HLD_Comp_Temp`, `Cooling_Air_IN_HLD_Comp_Temp`, 
    `SP8`, `SP10`, `SP12`, `SP13`, `Cycle_Time1`, `Cycle_Time2`, `Cycle_Time3`, `Inspection_OK_or_NG`, `SP15`, `SP16`, `SP17`, `SP19`, `SP20` 
FROM `datasensor`";
$result = $conn->query($query);

if (!$result) {
    die("Query gagal: " . $conn->error);
}

// Set header untuk file Excel
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=data_export.xls");
header("Pragma: no-cache");
header("Expires: 0");

// Tulis header tabel ke file Excel
$columns = array_keys($result->fetch_assoc());
echo implode("\t", $columns) . "\n";

// Reset pointer hasil query
$result->data_seek(0);

// Tulis data ke file Excel
while ($row = $result->fetch_assoc()) {
    echo implode("\t", $row) . "\n";
}

// Tutup koneksi
$conn->close();
?>
