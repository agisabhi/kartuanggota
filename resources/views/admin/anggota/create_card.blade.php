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
            font-size: 6.5pt;
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
            <br><br><br><br><br>
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
        
        <table style="width: 100%">
            <tr>
                <td align="center" colspan="2"><b>Ketua Umum</b></td>
                <td align="center" style="width: 50%"><b>Sekretaris Jenderal</b></td>
            </tr>
            <tr>
                <td align="right" style="width: 30%"><img src="{{ asset('storage/'.$setting->ttd_ketua) }}" height="10%"></td>
                <td align="left"><img src="{{ asset('storage/upload/logo.png') }}" height="15%"></td>
                <td align="center"><img src="{{ asset('storage/'.$setting->ttd_sekjen) }}" height="10%"></td>
            </tr>
            
            <tr>
                <td align="center" colspan="2"><b>{{ $setting->ketua_umum }}</b></td>

                <td align="center"><b>{{ $setting->sekjen }}</b></td>
            </tr>
        </table>
        </div>
    </body>
</html>