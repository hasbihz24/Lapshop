<!DOCTYPE html>
<html lang="en" class="bg-success-subtle">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin LapShop</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
  <script src="https://cdn.tiny.cloud/1/keyc2xcq3im7641zsh5jk4nbv97pxqega17suin78gq350zy/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</head>

<body class="bg-success-subtle">
  <script>
    $(document).ready(function() {
      $('#deskripsi').summernote();
    });
  </script>
  <div class="container py-1 my-5" style="width: 60%; background-color: white; height: fit-content;">
    <h1 class="mt-4 mb-4">Edit Data</h1>
    <form action="/Admin/aksiedit" method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" value="<?= $laptop['nama']; ?>" required />
      </div>
      <div class="mb-3">
        <label for="merek" class="form-label">Merek</label>
        <input type="text" class="form-control" id="merek" name="merek" value="<?= $laptop['merek']; ?>" required />
      </div>
      <div class="mb-3">
        <label for="jenis" class="form-label">Jenis</label>
        <select name="jenis" id="jenis" class="form-select" required>
          <option value="Standar">Standar</option>
          <option value="Netbook">Netbook</option>
          <option value="Gaming">Gaming</option>
          <option value="2-in-1">2-in-1</option>
          <option value="Ultrabook">Ultrabook</option>
          <option value="Workstation">Workstation</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="jumlah" class="form-label">Jumlah</label>
        <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= $laptop['jumlah']; ?>" required />
      </div>
      <div class="mb-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="number" class="form-control" id="harga" name="harga" value="<?= $laptop['harga']; ?>" required />
      </div>
      <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" required><?= $laptop['deskripsi']; ?></textarea>
      </div>
      <div class="mb-3">
        <button type="submit" class="btn btn-primary" onclick="tinymce.triggerSave();">Simpan</button>
        <a href="#" class="btn btn-secondary">Kembali</a>
      </div>
    </form>
  </div>
  <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'lists',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough  | addcomment showcomments | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      mergetags_list: [{
          value: 'First.Name',
          title: 'First Name'
        },
        {
          value: 'Email',
          title: 'Email'
        },
      ]
    });

    function previewImage(event) {
      var input = event.target;
      var preview = document.getElementById('gambarPreview');

      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          preview.src = e.target.result;
          preview.style.display = 'block';
        };

        reader.readAsDataURL(input.files[0]);
      } else {
        preview.src = '#';
        preview.style.display = 'none';
      }
    }
  </script>
</body>

</html>