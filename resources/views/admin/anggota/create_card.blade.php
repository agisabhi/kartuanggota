<html>
    <head></head>
    <style type="css/javascript">
    
    @page { 
        margin: 0mm;
        
    }

    body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            font-size: 12pt;
            background-image: url('{{ $settings }}');
            background-size: cover;
            background-attachment: fixed;
            background-repeat: no-repeat;
        }
    
    .table-container {
            margin: 25px;
        }
        table {
            border-collapse: collapse;
        }
        /* table th,
        table td {
            
            text-align: left;
            font-size: 3px;
            
        } */



    </style>
    <body>
        <div class="table-container">
            <br><br><br><br><br><br><br>
        <table>
            <tbody>
            <tr>
                <td>Nomor KTA</td>
                <td>:</td>
                <td>{{ $dataAnggota->nomor_kta }}</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>{{ $dataAnggota->nama }}</td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td>{{ $dataAnggota->nik }}</td>
            </tr>
            <tr>
                <td>Desa</td>
                <td>:</td>
                <td>{{ $dataAnggota->village->name }}</td>
            </tr>
            <tr>
                <td>Kecamatan</td>
                <td>:</td>
                <td>{{ $dataAnggota->district->name }}</td>
            </tr>
            <tr>
                <td>Kab/Kota</td>
                <td>:</td>
                <td>{{ $dataAnggota->city->name }}</td>
            </tr>
            <tr>
                <td>Provinsi</td>
                <td>:</td>
                <td>{{ $dataAnggota->province->name }}</td>
            </tr>
            
            </tbody>
        </table>
        <br>
        {{-- <table style="width: 100%">
            <tr>
                <td align="center"><b>Ketua Umum</b></td>
                <td align="center"><b>Sekretaris Jenderal</b></td>
            </tr>
            <tr>
                <td align="center"><br><br></td>
                <td align="center"></td>
            </tr>
            <tr>
                <td align="center"></td>
                <td align="center"></td>
            </tr>
            <tr>
                <td align="center"><b>H. JUBAEDI AF</b></td>
                <td align="center"><b>TB. TISNA</b></td>
            </tr>
        </table> --}}
        </div>
    </body>
</html>