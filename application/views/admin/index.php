<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">My profile</h1>
    <div class="card" style="width: 18rem;">
        <img src="<?= base_url('asset/img/') . $user['image']; ?>" class="card-img-top">
        <div class="card-body">
            <p class="card-text"><?= strtoupper($user['nama']); ?></p>
            <P>Bergabung sejak <?= date('d, M, Y', $user['date_created']); ?></P>
        </div>
    </div>

</div>
<!-- /.container-fluid -->