<form method="GET" action="<?php echo e(route('productSearch')); ?>">
    <fieldset>
        <div class="input-group stylish-input-group shift-down">

            <?php echo e(csrf_field()); ?>

            <input type="text" class="white-box form-control"
                   placeholder="Search" name="search"
                   <?php if(isset($old_value)): ?>
                   value="<?php echo e($old_value); ?>"
                    <?php endif; ?>
            >
            <span class="input-group-addon btn">
                <button type="submit" id="search_btn">
                    <span class="glyphicon glyphicon-search" ></span>
                </button>
            </span>

        </div>
    </fieldset>
</form>