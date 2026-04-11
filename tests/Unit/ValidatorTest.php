
<?php

test('it can validate a form', function () {
    expect(\Core\Validator::string("name"))->toBeTrue();
    expect(\Core\Validator::string(false))->toBeFalse();
    expect(\Core\Validator::string(''))->toBeFalse();
});


it('it can validate a form', function () {
    expect(\Core\Validator::string("nameassssssssssssss", 2, 255))->toBeTrue();
});
