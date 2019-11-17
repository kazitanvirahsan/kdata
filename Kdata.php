<?php
namespace Kdata;

class Kdata
{
    private $validation_rules = array();
    private $data = array();
    private $validation_errors = array();
    

    public function __construct()
    {
    }

    /**
     * Set validation rules
     *
     * @param array $rules
     *
     * @return array
     */
    public function add_validation_rules(array $rules = array())
    {
        if (empty($rules)) {
            return $this->validation_rules;
        }

        $this->validation_rules = $rules;
    }

    /**
     * Apply validation & sanitization rules on data
     *
     * @param array  $data
     *
     * @param string $rules_delimiter
     *
     * @param string $parameter_delimiter
     *
     * @return bool
     *
     * @throws Exception
     */
    public function execute(array $data, $rules_delimiter = '|', $parameter_delimiter = ',')
    {
        if (empty($data)) {
            throw new Exception('No data');
        }

        if ($this->validate($data, $rules_delimiter, $parameter_delimiter)!== true) {
            return false;
        }

        return true;
    }

    /**
     * Read validation rules of each value and apply those rules one by one
     *
     * @param array  $data                user data
     *
     * @param string $rules_delimiter
     *
     * @param string $parameter_delimiter
     *
     * @return...bool $is_validation
     */
    public function validate($data, $rules_delimiter, $parameter_delimiter)
    {
        foreach ($data as $key => $value) {
             $key_rules_str = $this->validation_rules[$key];
             $key_rules_arr = explode($rules_delimiter, $key_rules_str);
             
             $is_validate = true;

            foreach ($key_rules_arr as $rule) {
                   $validation_response = call_user_func_array(array($this, 'is_' . $rule), array($data, $key, $value));
                    
                if ($validation_response !== true) {
                    $is_validate = $is_validate && false;
                    array_push($this->validation_errors, $validation_response);
                }
            }
        }

        if ($is_validate === true) {
            $this->data = $data;
        }

        return $is_validate;
    }

    /**
     * Get validation rules of each value and apply those rules one by one
     *
     * @param array  $data   user data
     *
     * @param string $key    field
     *
     * @param string $value  field value
     *
     * @param array  $params validation parameters
     *
     * @return mixed (bool or array)
     */
    private function is_required($data, $key, $value, $params = null)
    {
        /*  These considered to be True
            "" (an empty string) 0 (0 as an integer) 0.0 (0 as a float) "0" (0 as a string)
        */
        if (isset($data[$key])
            && ( $data[$key] === 0  || $data[$key] === '0'
            || $data[$key] === 0.0 || $data[$key] === '0.0' || !empty($data[$key]) )
        ) {
            return true;
        }

        return array('name' => $key,
                     $value  => 'null',
                     'rule' => __FUNCTION__,
                     'params' => $param
                     );
    }

    /**
     * Returns user input
     *
     * @return array
     */
    public function get_data()
    {
        return $this->data;
    }

    /**
     * Returns error details after applying (vaidation & sanitization) rules
     *
     * @return array
     */
    public function get_errors()
    {
        return $this->validation_errors;
    }
}
