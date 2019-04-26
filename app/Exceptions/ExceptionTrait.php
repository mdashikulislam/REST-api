<?php

 namespace App\Exceptions;

 use Illuminate\Database\Eloquent\ModelNotFoundException;
 use Illuminate\Database\QueryException;
 use Illuminate\Http\Response;
 use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

 trait ExceptionTrait{
    public function apiException($request,$exception){
        if ($this->isModelNotFound($exception)){
           return $this->modelResponse();
        }

        if ($this->isHttpNotFound($exception)){
            return $this->httpResponse();
        }
        if ($this->isQuerryNotExecuted($exception)){
            return $this->queryResponse();
        }
        return parent::render($request, $exception);
    }

    protected function isModelNotFound($exception){
        return $exception instanceof ModelNotFoundException;
    }
    protected function isHttpNotFound($exception){
        return $exception instanceof NotFoundHttpException;
    }
     protected function isQuerryNotExecuted($exception){
        return $exception instanceof QueryException;
     }
     protected function modelResponse(){
        return response()->json([
            'error' => 'Product Not Found'
        ],Response::HTTP_NOT_FOUND);
    }
    protected function httpResponse(){
        return response()->json([
            'error' => 'Route Not Found'
        ],Response::HTTP_NOT_FOUND);
    }

    protected  function queryResponse(){
        return response()->json([
            'error' => 'Incorrect Query data'
        ],Response::HTTP_NOT_ACCEPTABLE);
    }
 }