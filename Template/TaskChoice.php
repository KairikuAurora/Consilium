<div id="tasks"></div>

<script>
    displayTasks( 
        <?= json_encode($tasks) ?>, 
        <?= json_encode($taskTypes) ?>, 
        <?= json_encode($suppliers) ?>,
        <?= json_encode($url) ?>
    );
</script>