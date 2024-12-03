import { useState } from "react";

const Form = () => {
  const [value, setValue] = useState("");
  const handleSubmit = (event) => {
    event.preventDefault();
    console.log(value);
  };

  return (
    <form onSubmit={handleSubmit}>
      <label>
        Masukkan Nama:
        <input
          type="text"
          value={value}
          onChange={(e) => setValue(e.target.value)}
        />
        <input type="submit" />
      </label>
    </form>
  );
};

export default Form;
