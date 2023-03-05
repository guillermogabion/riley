
import axios from "axios";
// const baseDomain = "http://127.0.0.1:9090";
// const baseDomain = "http://127.0.0.1:8000";
// const baseDomain = "http://192.168.2.214:8000";

// const baseDomain = "https://canteen-back.checkmy.dev";
// const baseURL = `${baseDomain}/api`; // Incase of /api/v1;
const axiosInstance1 = axios.create({
    baseURL: 'http://127.0.0.1:8000/admin/user'
  });

export default axiosInstance1;


