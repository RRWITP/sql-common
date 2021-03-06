<?php
/**
 * Plasma SQL common component
 * Copyright 2019 PlasmaPHP, All Rights Reserved
 *
 * Website: https://github.com/PlasmaPHP
 * License: https://github.com/PlasmaPHP/sql-common/blob/master/LICENSE
*/

namespace Plasma\SQL;

/**
 * Internal interface.
 * @internal
 */
interface ConflictTargetInterface {
    /**
     * Get the conflict identifier.
     * @return string
     */
    function getIdentifier(): string;
}
