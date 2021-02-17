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
