<?php

namespace App\Http\Middleware;

use App\Http\Controllers\AuthController;
use Closure;
use Illuminate\Http\Request;

class isadmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

    // این چیزیه که تو اینترنت برای دسترسی به توکن جی دابلیو تی پیدا کردم اما فکر نمی‌کنم درست باشه        
   // Instantiate the Okta JWT verifier
//           $jwtVerifier = (new JwtVerifierBuilder())
//           ->setAdaptor(new FirebasePhpJwt())
//           ->setAudience('api://default')
//           ->setClientId(env('OKTA_CLIENT_ID'))
//           ->setIssuer(env('OKTA_ISSUER_URI'))
//           ->build();

//       try {
//           // Verify the JWT passed as a bearer token
//           $jwtVerifier->verify($request->bearerToken());
//           return $next($request);
//       } catch (\Exception $exception) {
//           // Log exceptions
//           Log::error($exception);
//       }

//       // If we couldn't verify, assume the user is unauthorized
//       return response('Unauthorized', 401);
//   }

    // این چیزیه که می‌خواستم با دسترسی به کنترلر بهش برسم اما فکر نمی‌کنم این هم درست باشه
        $Auth = new AuthController();
        $Auth = AuthController->response();
        if (!$request->response() && $user){
            return redirect('noaccess');
        }
        return $next($request);
    }
}
