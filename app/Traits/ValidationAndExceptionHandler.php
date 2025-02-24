<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\QueryException;

trait ValidationAndExceptionHandler
{
    /**
     * Validates the incoming request and handles exceptions with a callback function.
     *
     * @param Request $request
     * @param array $rules
     * @param callable $callback
     * @return \Illuminate\Http\JsonResponse
     */
    public function validateAndHandle(Request $request, array $rules, callable $callback)
    {
        try {
            // Validation des données
            $data = $request->validate($rules);

            // Exécution de la logique de callback avec les données validées
            $result = $callback($data);

            // Retourner la réponse en JSON en cas de succès
            return response()->json(["result" => $result]);

        } catch (ValidationException $e) {
            // Gestion des erreurs de validation
            $errors = $e->errors();
            return response()->json(['error' => $errors]);

        } catch (QueryException $e) {
            // Gestion des erreurs liées à la base de données
            return response()->json(['error' => $e->getMessage()]);

        } catch (\Exception $e) {
            // Gestion des exceptions générales
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
