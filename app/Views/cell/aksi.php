<td class="align-middle">
    <div class="btn-group" role="group" aria-label="Basic example">
        <?php if (isset($detail)) : ?>
            <a href="/<?= $url; ?>/detail/<?= $id ?>" class="btn btn-sm btn-info"><i class="bi bi-card-text"></i></a>
        <?php endif;  ?>

        <a href="/<?= $url; ?>/edit/<?= $id ?>" class="btn btn-sm btn-primary"><i data-feather="edit"></a>
        <button onclick="confirmDelete('/<?= $url; ?>/delete/<?= $id; ?>')" class="btn btn-sm btn-danger"><i data-feather="trash-2"></button>
    </div>
</td>

<td>
    <?php if (isset($detail)) : ?>
        <button onclick="detail('/<?= $url; ?>/detail/<?= $id ?>')" class="btn btn-datatable btn-icon btn-transparent-dark me-2"><i data-feather="info"></i></button>
    <?php endif;  ?>

    <button onclick="edit('/<?= $url; ?>/edit/<?= $id ?>')" class="btn btn-datatable btn-icon btn-transparent-dark me-2"><i data-feather="info"></i></button>
    <button class="btn btn-datatable btn-icon btn-transparent-dark"><i data-feather="trash-2"></i></button>
</td>