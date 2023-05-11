<?php

namespace App\Http\Filters;

use Illuminate\Http\Request;

class FlightFilter{
    protected $safeParams = [];

    protected $columnMap = [];

    protected $operatorMap = [
        "eq" => "=",
        "lt" => "<",
        "lte" => "<=",
        "gt" => ">",
        "gte" => ">="
    ];

    public function transform(Request $request){
        $eloquentQuery = [];
        $eloquentQuery["pagination"] = ["per_page" => $request->per_page ?? 5];

        foreach ($this->safeParams as $param => $operators){
            $query = $request->query($param);

            if(!isset($query)){
                continue;
            }
            $column = $this->columnMap[$param] ?? $param;
            foreach($operators as $operator){
                if(isset($query[$operator])){
                    $eloquentQuery["query"][] = [$column, $this->operatorMap[$operator], $query[$operator]];
                }
            }
        }

        return $eloquentQuery;
    }
}
