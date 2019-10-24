##Trait for fast create tables 

```php
use Serh\LaravelCrud\Traits\CrudAndView;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use CrudAndView;

    private $name="Users";
    private $tab=[
        "name"=>[
            "type"=>"text",
            "name"=>"name",
            "maxlength"=>"255"
                ],
        "barcode"=>[
            "type"=>"number",
            "name"=>"Code",
            "maxlength"=>"255"
        ],
        "description"=>[
            "type"=>"textarea",
            "name"=>"Description",
            "maxlength"=>"1000"
        ]
    ];
    private $model=Users::class;
   
}
```