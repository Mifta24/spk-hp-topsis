<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SPK</title>
</head>
<body>
    <form method="GET" action="{{ route('recommendation') }}" class="space-y-4">
        <div>
          <label>Harga Minimum</label>
          <input type="number" name="min_price" class="input input-bordered w-full" required>
        </div>
        <div>
          <label>Harga Maksimum</label>
          <input type="number" name="max_price" class="input input-bordered w-full" required>
        </div>

        <div class="mt-4">
          <label>Kriteria yang Diinginkan</label>
          <div class="space-y-2 mt-2">
            <div>
              <label>Kamera</label>
              <select name="criteria[camera]" class="select w-full">
                <option value="5">Sangat Penting</option>
                <option value="3">Penting</option>
                <option value="1">Biasa Saja</option>
              </select>
            </div>
            <div>
              <label>Baterai</label>
              <select name="criteria[battery]" class="select w-full">
                <option value="5">Sangat Penting</option>
                <option value="3">Penting</option>
                <option value="1">Biasa Saja</option>
              </select>
            </div>
            <div>
              <label>RAM</label>
              <select name="criteria[ram]" class="select w-full">
                <option value="5">Sangat Penting</option>
                <option value="3">Penting</option>
                <option value="1">Biasa Saja</option>
              </select>
            </div>
          </div>
        </div>

        <button type="submit" class="btn btn-primary mt-4">Cari Handphone</button>
      </form>

</body>
</html>
