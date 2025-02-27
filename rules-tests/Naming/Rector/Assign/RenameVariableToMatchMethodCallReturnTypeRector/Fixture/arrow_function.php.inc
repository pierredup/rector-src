<?php

namespace Rector\Tests\Naming\Rector\Assign\RenameVariableToMatchMethodCallReturnTypeRector\Fixture;

use Rector\Tests\Naming\Rector\Assign\RenameVariableToMatchMethodCallReturnTypeRector\Source\SameNameMethod;

final class SomeArrowFunction
{
    public function run(SameNameMethod $sameNameMethod)
    {
        $fn1 = fn($x) => $x + $stamp = $sameNameMethod->getName();
    }
}

?>
-----
<?php

namespace Rector\Tests\Naming\Rector\Assign\RenameVariableToMatchMethodCallReturnTypeRector\Fixture;

use Rector\Tests\Naming\Rector\Assign\RenameVariableToMatchMethodCallReturnTypeRector\Source\SameNameMethod;

final class SomeArrowFunction
{
    public function run(SameNameMethod $sameNameMethod)
    {
        $fn1 = fn($x) => $x + $fullName = $sameNameMethod->getName();
    }
}

?>
