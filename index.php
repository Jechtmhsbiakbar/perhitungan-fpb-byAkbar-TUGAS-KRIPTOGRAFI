<?php
require_once 'fpb1.php';

$hasil = null;
$nilaiA = null;
$nilaiB = null;
$isCoprime = null;
$proses = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nilaiA = intval($_POST['nilaiA']);
    $nilaiB = intval($_POST['nilaiB']);

    if ($nilaiA > 0 && $nilaiB > 0) {
        $fpbCalc = new FPB();
        $hasil = $fpbCalc->hitungFPB($nilaiA, $nilaiB, $proses);
        $isCoprime = ($hasil == 1);
    }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator FPB</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f3ebeb 0%, #d8d2de 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .nameAkbar {
            position: absolute;
            top: 20px;
            left: 20px;
            background: white;
            padding: 15px 25px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            border-left: 4px solid #667eea;
        }

        .nameAkbar h2 {
            color: #333;
            font-size: 16px;
            font-weight: 600;
            margin: 5px 0;
            line-height: 1.5;
        }

        .nameAkbar h2:first-child {
            color: #667eea;
        }

        .container {
            width: 100%;
            max-width: 500px;
        }

        .card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            padding: 40px;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .card-header h1 {
            color: #333;
            font-size: 28px;
            margin-bottom: 8px;
        }

        .card-header p {
            color: #666;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 600;
            font-size: 14px;
        }

        input[type="number"] {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s ease;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        input[type="number"]:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .button-group {
            display: flex;
            gap: 10px;
            margin-top: 30px;
        }

        button {
            flex: 1;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-hitung {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-hitung:hover {
            transform: scale(1.02);
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
        }

        .btn-reset {
            background: #f0f0f0;
            color: #333;
        }

        .btn-reset:hover {
            background: #e0e0e0;
        }

        .result-section {
            margin-top: 30px;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 10px;
            border-left: 4px solid #667eea;
        }

        .result-section h3 {
            color: #333;
            margin-bottom: 15px;
            font-size: 18px;
        }

        .result-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 12px;
            padding: 10px;
            background: white;
            border-radius: 6px;
        }

        .result-label {
            color: #666;
            font-weight: 500;
        }

        .result-value {
            color: #667eea;
            font-weight: 700;
            font-size: 18px;
        }

        .proses-item {
            padding: 8px 12px;
            background: white;
            border-radius: 6px;
            margin-bottom: 8px;
            color: #555;
            font-family: 'Courier New', monospace;
            font-size: 14px;
            border-left: 3px solid #764ba2;
        }

        .status-badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            margin-top: 10px;
        }

        .status-coprime {
            background: #d4edda;
            color: #155724;
        }

        .status-not-coprime {
            background: #f8d7da;
            color: #721c24;
        }

        .proses-section {
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #e0e0e0;
        }

        .proses-section h4 {
            color: #333;
            margin-bottom: 10px;
            font-size: 14px;
        }

        @media (max-width: 480px) {
            .card {
                padding: 25px;
            }

            .button-group {
                flex-direction: column;
            }

            .card-header h1 {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>
    <div class="nameAkbar">
        <h2>Nama : Muhammad Hasbih Akbar</h2>
        <h2>NIM : 231220075</h2>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>🔢 Kalkulator FPB</h1>
                <p>Faktor Persekutuan Terbesar</p>
            </div>

            <form method="POST">
                <div class="form-group">
                    <label for="nilaiA">Nilai A</label>
                    <input type="number" id="nilaiA" name="nilaiA" value="<?php echo $nilaiA ?? ''; ?>"
                        placeholder="Masukkan angka pertama" required>
                </div>

                <div class="form-group">
                    <label for="nilaiB">Nilai B</label>
                    <input type="number" id="nilaiB" name="nilaiB" value="<?php echo $nilaiB ?? ''; ?>"
                        placeholder="Masukkan angka kedua" required>
                </div>

                <div class="button-group">
                    <button type="submit" class="btn-hitung">Hitung FPB</button>
                    <button type="button" class="btn-reset" onclick="resetForm()">Reset</button>
                </div>
            </form>

            <?php if ($hasil !== null): ?>
                <div class="result-section">
                    <h3>📊 Hasil Perhitungan</h3>

                    <div class="result-item">
                        <span class="result-label">Nilai A</span>
                        <span class="result-value"><?php echo $nilaiA; ?></span>
                    </div>

                    <div class="result-item">
                        <span class="result-label">Nilai B</span>
                        <span class="result-value"><?php echo $nilaiB; ?></span>
                    </div>

                    <div class="result-item">
                        <span class="result-label">FPB</span>
                        <span class="result-value" style="color: #28a745; font-size: 24px;"><?php echo $hasil; ?></span>
                    </div>

                    <?php if ($isCoprime): ?>
                        <span class="status-badge status-coprime">✓ <?php echo $nilaiA; ?> dan <?php echo $nilaiB; ?> adalah
                            Bilangan Coprime</span>
                    <?php else: ?>
                        <span class="status-badge status-not-coprime">✕ <?php echo $nilaiA; ?> dan <?php echo $nilaiB; ?> bukan
                            Bilangan Coprime</span>
                    <?php endif; ?>

                    <?php if (!empty($proses)): ?>
                        <div class="proses-section">
                            <h4>📝 Langkah-langkah Perhitungan:</h4>
                            <?php foreach ($proses as $step): ?>
                                <div class="proses-item"><?php echo $step; ?></div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script>
        function resetForm() {
            // Clear form inputs
            document.getElementById('nilaiA').value = '';
            document.getElementById('nilaiB').value = '';

            // Clear result section
            document.querySelector('.result-section').innerHTML = '';

            // Clear proses section
            document.querySelector('.proses-section').innerHTML = '';

            // Clear status badge
            document.querySelector('.status-badge').remove();

            // Clear proses items
            document.querySelectorAll('.proses-item').forEach(function (item) {
                item.remove();
            });
            document.querySelector('.result-section').remove();
            // Clear hasil perhitungan
            $hasil = null;


            // Reload page to clear results
            window.location.reload();
        }
    </script>
</body>

</html>