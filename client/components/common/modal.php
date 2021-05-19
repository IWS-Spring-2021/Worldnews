<div class="modal fade" id="modal<?php echo $target_id ?>" tabindex="-1" role="dialog" aria-labelledby="modaLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modaLabel"><?php echo $target_action;?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                <?php echo $confirm_message; ?>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <a href="/worldnews/client/<?php echo $file_controller ?>?id=<?php echo $target_id?>">
                    <button type="submit" class="btn btn-primary" id="confirm">Confirm</button></a>
            </div>
        </div>
    </div>
</div>