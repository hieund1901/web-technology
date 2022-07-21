import React, { useState } from 'react';
import Select from 'react-select';
import makeAnimated from 'react-select/animated';
//import { colourOptions } from './data.js';

//const ListEmployee = ['a1', 'a2', 'a3', 'a4']

const animatedComponents = makeAnimated();
const colourOptions = [
    { value: 'blue', label: 'blue' },
    { value: 'red', label: 'red' },
  ];

function App() {

  const [selecteds, setSelecteds] = useState("");  
  function handleChange(newColor){
    setSelecteds(newColor)
     //this prints the selected option
  }
  console.log("selecteds: ",selecteds);

  return (    

    <div>
    <p>Sang thu2</p>

    <React.Fragment>
      <Select
      closeMenuOnSelect={false}
      components={animatedComponents}
      defaultValue={null}
      isMulti
      value={selecteds}
      onChange={handleChange}
      options={colourOptions}
      />
    </React.Fragment> 

    </div>
  );
}

export default App