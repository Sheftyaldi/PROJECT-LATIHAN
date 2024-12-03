import { useState } from "react";

const Option = () => {
  const [value, setValue] = useState("Teknik Informatika");
  const handleChange = (event) => {
    setValue(event.target.value);
    console.log(value);
  };

  return (
    <form>
      <label>
        Pilih Jurusan
        <select value={value} onChange={handleChange}>
          <option value="Kedokteran">Kedokteran</option>
          <option value="Teknik Sipil">Teknik Sipil</option>
          <option value="Teknik Informatika">Teknik Informatika</option>
        </select>
      </label>
    </form>
  );
};

export default Option;
