import java.util.*;
import edu.princeton.cs.algs4.StdRandom;

/**
 *  https://www.coursera.org, Algorithms, week 1, part 1
 */

class UnionFind
{
    /**
     *  Array where inndex - is a value of parameter
     *   and value - is a index of parent node
     */
    private int[] id;

    /**
     *  Array where index - is a value of parameter
     *   and value - is a sum of a chaild nodes
     */
    private int[] sz;

    /**
     *  Class constructor
     *   Initialize values for id and sz arrays.
     * @param N
     */
    public UnionFind(int N)
    {
        id = new int[N];
        sz = new int[N];
        for (int i = 0; i < N; i++) {
            id[i] = i;
            sz[i] = 1;
        }
    }

    public static void main (String[] args)
    {
        Scanner scan = new Scanner(System.in);
        int N = Integer.parseInt(args[0]);
        UnionFind uf = new UnionFind(N);
        for (int i = 1; i < N; i++) {
            int p = Integer.parseInt(args[i]);
            int q = Integer.parseInt(args[i + 1]);
            if (uf.connected(p, q)) {
                uf.union(p, q);
                System.out.println(p + " " +  q);
            }
        }
    }

    /**
     * Set parent value of grandfather value and return this value.
     * @param i
     * @return
     */
    private int root(int i)
    {
        while (i != id[i]) {
            id[i] = id[id[i]];
            i = id[i];
        }
        return i;
    }

    /**
     *  Compare parent values.
     *
     * @param p
     * @param q
     * @return
     */
    public boolean connected( int p , int q)
    {
        return root(p) == root(q);
    }

    /**
     * Compare parent values,
     *  union smallest node to largest one
     *  and increase root size.
     * @param p
     * @param q
     */
    public void union (int p, int q)
    {
        int i = root(p);
        int j = root(q);
        if (i == j) return;
        if (sz[i] < sz[j]) { id[i] = j; sz[j] += sz[i]; }
        else               { id[j] = i; sz[i] += sz[j]; }
    }
}