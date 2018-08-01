export default {
  Title: {
    required: true,
    min: 4,
    max: 255
  },
  Price: {
    required: true,
    numeric: true,
    min_value: 0
  },
  Area: {
    required: true,
    numeric: true,
    min_value: 0
  },
  Address: {
    required: true,
    alpha_num: true,
    max: 255
  },
  Latitude: {
    decimal: 7
  },
  Langitude: {
    decimal: 7
  },
  Name: {
    required: true,
    alpha: true,
    max: 25
  },
  Email: {
    email: true,
    max: 25
  },
  Phone: {
    numeric: true
  },
  Photo: {
    image: true
  }
}
