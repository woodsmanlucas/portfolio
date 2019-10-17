using System;
using System.Data;
using System.Data.SqlClient;


namespace Portfolio
{
    class Program
    {
        static class SqlHelper
        {
            public static SqlDataReader ExecuteReader(String connString, String commandText)
            {
                SqlConnection conn = new SqlConnection(connString);
                using (SqlCommand cmd = new SqlCommand(commandText, conn))
                {
                    conn.Open();
                    SqlDataReader reader = cmd.ExecuteReader(CommandBehavior.CloseConnection);
                    return reader;
                }
            }
        }

        static void Main(string[] args)
        {
            String connString = "Data Source=.; Initial Catalog=portfolio; Integrated Security=true;";
            String commandText = "SELECT * FROM Project;";
            using (SqlDataReader reader = SqlHelper.ExecuteReader(connString, commandText))
            {
                while (reader.Read())
                {
                    Console.WriteLine(reader["projectName"].ToString() + " " + reader["gitHubLink"].ToString());
                }
            }

        }
    }
}
