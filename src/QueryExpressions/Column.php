<?php
/**
 * Plasma SQL common component
 * Copyright 2019 PlasmaPHP, All Rights Reserved
 *
 * Website: https://github.com/PlasmaPHP
 * License: https://github.com/PlasmaPHP/sql-common/blob/master/LICENSE
*/

namespace Plasma\SQL\QueryExpressions;

/**
 * Represents a column.
 */
class Column implements \Plasma\SQL\ConflictTargetInterface {
    /**
     * @var string|Fragment
     */
    protected $column;
    
    /**
     * @var string|null
     */
    protected $alias;
    
    /**
     * @var bool
     */
    protected $allowEscape;
    
    /**
     * Constructor.
     * @param string|Fragment  $column
     * @param string|null      $alias
     * @param bool             $allowEscape
     */
    function __construct($column, ?string $alias, bool $allowEscape) {
        $this->alias = $alias;
        $this->column = $column;
        $this->allowEscape = $allowEscape;
    }
    
    /**
     * Get the column.
     * @return string
     */
    function getColumn(): string {
        return $this->column;
    }
    
    /**
     * Get the alias.
     * @return string|null
     */
    function getAlias(): ?string {
        return $this->alias;
    }
    
    /**
     * Whether the column allows escaping.
     * @return bool
     */
    function allowEscape(): bool {
        return $this->allowEscape;
    }
    
    /**
     * Get the SQL string for this.
     * @param \Plasma\SQL\GrammarInterface|null  $grammar
     * @return string
     */
    function getSQL(?\Plasma\SQL\GrammarInterface $grammar): string {
        if($grammar !== null && $this->allowEscape) {
            $column = $grammar->quoteColumn($this->column);
        } else {
            $column = $this->column;
        }
        
        return $column.($this->alias ? ' AS '.$this->alias : '');
    }
    
    /**
     * Get the conflict identifier.
     * @return string
     */
    function getIdentifier(): string {
        return ((string) $this->column);
    }
    
    /**
     * Turns the expression into a SQL string.
     * @return string
     */
    function __toString(): string {
        return $this->getSQL(null);
    }
}
