### New things I leant (only for my future reference):

-   laravel mass assignment: dumps all the data from form into the table after validation, but be cautious of malicious data by protecting the model

```
<!-- CONTROLLER METHOD -->
public function store()
    {

        $data = request()->validate([
            'name' => 'required',
            'email' => 'bail|required|email|unique:customers'
        ]);

        \App\Models\Customer::create($data);

        return redirect('/customer');
    }
<!-- MODEL PROTECTION: IF USING MASS ASSIGNMENT -->
class Customer extends Model
{
    use HasFactory;

    // 1)
    protected $fillable = ['name','email'];

    //OR

    // 2)
    // protected $guarded = [];
}

```

-   laravel route model binding: binds a route to specific model

```
    // Route model binding
    public function show(\App\Models\Customer $customer)
    {
        return view('customer.show', compact('customer'));
    }
```

-   ignore unique validation for self but apply on all others while updating email

```
    // email validation: ignore self in unique validation
    $data = request()->validate([
        'name' => 'required',
        'email' => ['required','email',\Illuminate\Validation\Rule::unique('customers')->ignore($customer)]
    ]);

```

-   request() is a helper function that goes into the big array called service container and it grabs the request

```
if (! function_exists('request')) {
    /**
     * Get an instance of the current request or an input item from the request.
     *
     * @param  array|string|null  $key
     * @param  mixed  $default
     * @return \Illuminate\Http\Request|string|array|null
     */
    function request($key = null, $default = null)
    {
        if (is_null($key)) {
            return app('request');
        }

        if (is_array($key)) {
            return app('request')->only($key);
        }

        $value = app('request')->__get($key);

        return is_null($value) ? value($default) : $value;
    }
}
```
