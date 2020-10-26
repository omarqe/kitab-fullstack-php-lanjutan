<?php
/**
 * A helper function as indicator to tell that the class has been
 * instantiated successfully.
 *
 * @return  void
 */
function wasInstantiated(string $className): void
{
    printf(
        'Class <code>%s</code> was instantiated.<br/>',
        $className
    );
}
