<?php /** @noinspection ClassOverridesFieldOfSuperClassInspection */

    namespace App\Models;

    use Psr\Http\Message\ServerRequestInterface;
    use Illuminate\Database\Eloquent\Model;

    class User extends Model
    {
        /**
         * The table associated with the model.
         *
         * @var string
         */
        protected $table = 'user';

        /**
         * Primary Key associated with this table.
         *
         * @var string
         */
        protected $primaryKey = 'id';


        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
            'first_name',
            'last_name',
            'email',
            'password'
        ];

        /**
         * Returns entire table - be careful!
         *
         * @param void
         *
         * @return array
         */
        public static function getAll () : array {

            /** @var \Illuminate\Database\Eloquent\Collection $users */
            $users = self::all();

            return self::keyFix($users);
        }

        /**
         * Returns single record
         *
         * @param $id
         *
         * @return array
         */
        public static function getById ($id) : array {

            /** @var \Illuminate\Database\Eloquent\Collection $users */
            $user = self::find($id)->get();

            return self::keyFix($user);
        }


        public static function addUser (ServerRequestInterface $request) {
            self::create($request->getParsedBody());
        }


        public static function updateUser (ServerRequestInterface $request, $id) {
//
//            $user = User::first();
//            $user->email = 'updated@domain.com';
//            $user->save();

            self::where('id', $id)->update($request->getParams());
        }

        public static function deleteUserById ($id) {
            self::find($id)->delete();
        }

        /**
         * Converts JSON Object to index array based upon record ID
         *
         * @param \Illuminate\Database\Eloquent\Collection $data
         * @param string                                   $key User defined field name to use as key
         *
         * @return array
         */
        private static function keyFix (\Illuminate\Database\Eloquent\Collection $data, $key = 'id') : array {

            /** @var array $data */
            $data = json_decode($data, true);

            $array = [];

            if(is_array($data)) {
                foreach ($data as $record) {
                    $array[$record[$key]] = $record;
                }

                ksort($array);
            }

            return $array;
        }

    }
